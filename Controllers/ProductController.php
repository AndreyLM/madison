<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/22/18
 * Time: 1:36 PM
 */

namespace Controllers;


use App\Controller\BaseController;
use App\Router\Exceptions\RequestNotMatchedException;
use App\Template\ITemplateRenderer;
use Models\Entities\Price;
use Models\Entities\Product;
use Models\Exceptions\ModelNotFoundException;
use Models\Exceptions\ModelRuntimeException;
use Models\Repositories\IProductRepository;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class ProductController extends BaseController
{
    private $repository;

    public function __construct(ServerRequestInterface $request, ITemplateRenderer $template, IProductRepository $repository)
    {
        parent::__construct($request, $template);
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->renderHtml('product/index', [
            'products' => $this->repository->getAll()
        ]);
    }

    public function view()
    {
        $id = $this->request->getAttribute('id');

        $product = $this->getModel($id);

        return $this->renderHtml('product/view', [
            'product' => $product,
            'getDynamic' => function() use ($product) {
                /** @var $product Product */
                return $product->getDynamicPriceChanging();
        }]);
    }

    public function create()
    {
        return $this->saveProduct('product/create', new Product());
    }

    public function update()
    {
        $id = $this->request->getAttribute('id');

        $product = $this->getModel($id);

        return $this->saveProduct('product/update', $product);
    }

    public function getChartDate()
    {
        $model = $this->getModel($this->request->getAttribute('id'));

        $date = $model->getDynamicPriceChanging();

        $result = [];
        $result[] = ['value', 'date'];

        /* @var $item Price*/
        foreach ($date as $item) {
            $result[] = [$item->value, $item->startDate];
            $result[] = [$item->value, $item->expirationDate];
        }

        return new JsonResponse($result);
    }

    public function delete()
    {
        $id = $this->request->getAttribute('id');

        if(!$this->repository->delete($id))
            throw new ModelRuntimeException('Cannot delete product');

        return $this->index();
    }

    private function saveProduct($view, Product $product)
    {
        if($model = $this->postProduct()) {
            $this->addPrices($model);

            if($model->validate()) {
                $id = $this->repository->save($model);
                $this->request = $this->request->withAttribute('id', $id);
                return $this->view();

            }
        }

        return $this->renderHtml($view, [
            'product' => $product
        ]);
    }


    private function postProduct()
    {
        if($this->request->getMethod() !== 'POST')
            return null;


        $prodFields = $this->request->getParsedBody();


        $pId = $prodFields['product-id'];
        $pName = $prodFields['product-name'];
        $pPrice = $prodFields['product-default-price'];
        $pDiscount = $prodFields['product-discount'];

        return new Product($pId, $pName, $pPrice, $pDiscount);
    }

    private function addPrices(Product $product)
    {
        /* Clear all price is case of duplication */
        $product->clearPrices();


        /* First price in form used as template and is empty */
        $prices = $this->request->getParsedBody()['price'];


        $count = count($prices['value']);

        for($i=1; $i<$count; $i++) {
            $product->addPrice(new Price(
                null,
                $prices['value'][$i],
                strtotime($prices['start-date'][$i]),
                strtotime($prices['expiration-date'][$i])
            ));
        }

    }

    private function getModel($id)
    {
        try {
            $product = $this->repository->getById($id);
        } catch (ModelNotFoundException $exception){
            throw new RequestNotMatchedException($this->request);
        }

        return $product;
    }

}