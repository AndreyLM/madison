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
        return $this->renderHtml('product/view');
    }

    public function create()
    {
        return $this->renderHtml('product/create');
    }

    public function update()
    {
        return $this->renderHtml('product/update');
    }

    public function delete()
    {
        return $this->renderHtml('product/index');
    }

}