<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/22/18
 * Time: 1:36 PM
 */

namespace Controllers;


use App\Controller\BaseController;
use App\Template\ITemplateRenderer;
use Models\Entities\Price;
use Models\Entities\Product;
use Models\Exceptions\ModelNotFoundException;
use Models\Exceptions\ModelRuntimeException;
use Models\Repositories\IProductRepository;
use Psr\Http\Message\ServerRequestInterface;

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


        return $this->renderHtml('product/view', [
            'product' => $this->repository->getById($id)]);
    }

    public function create()
    {
        if($product = $this->postProduct()) {
            $this->addPrices($product);
            if($product->validate()) {
                try {
                    $newProduct = $this->repository->save($product);
                    $this->request = $this->request->withAttribute('id', $newProduct->id);
                    return $this->view();
                } catch (ModelRuntimeException $exception) {

                }

            }
        }

        return $this->renderHtml('product/create', [
            'product' => new Product()
        ]);
    }

    public function update()
    {
        $id = $this->request->getAttribute('id');

        if($product = $this->postProduct()) {
            $this->addPrices($product);
            if($product->validate()) {
                try {
                    $newProduct = $this->repository->save($product);
                    $this->request = $this->request->withAttribute('id', $newProduct->id);
                    return $this->view();
                } catch (ModelRuntimeException $exception) {

                }

            }
        }
        return $this->renderHtml('product/update');
    }

    public function delete()
    {
        return $this->renderHtml('product/index');
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
        /* First price in form used as template and is empty */
        $prices = $this->request->getParsedBody()['price'];
        $count = count($prices['value'])-1;

        for($i=1; $i<$count; $i++) {
            $product->addPrice(new Price(
                null,
                $prices['value'][$i],
                $prices['start-date'][$i],
                $prices['expiration-date'][$i]
            ));
        }
    }

    private function getModel($id)
    {
        try {
            $product = $this->repository->getById($id);
        } catch (ModelNotFoundException $exception){

        }
    }

}