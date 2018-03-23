<?php

use App\Router\IRouter;
use Controllers\DefaultController;
use Controllers\ProductController;
use Models\Repositories\IProductRepository;
use Zend\ServiceManager\ServiceLocatorInterface;

/* @var $serviceManager ServiceLocatorInterface */

$router = $serviceManager->get(IRouter::class);


$router->addRoute('product', '/product/{id}', function ($request, $template) use ($serviceManager) {
    $controller = new ProductController($request, $template, $serviceManager->get(IProductRepository::class));
    return $controller->view();
}, ['GET'], ['tokens' => ['id' => '\d+']]);


$router->addRoute('product_update', '/product/update/{id}', function ($request, $template) use ($serviceManager) {
    $controller = new ProductController($request, $template, $serviceManager->get(IProductRepository::class));
    return $controller->update();
}, ['GET', 'POST'], ['tokens' => ['id' => '\d+']]);


$router->addRoute('product_delete', '/product/delete/{id}', function ($request, $template) use ($serviceManager) {
    $controller = new ProductController($request, $template, $serviceManager->get(IProductRepository::class));
    return $controller->delete();
}, ['GET', 'POST'], ['tokens' => ['id' => '\d+']]);

$router->addRoute('product_create', '/product/create', function ($request, $template) use ($serviceManager) {
    $controller = new ProductController($request, $template, $serviceManager->get(IProductRepository::class));
    return $controller->create();
}, ['GET', 'POST']);


$router->addRoute('products', '/products', function ($request, $template) use ($serviceManager) {
    $controller = new ProductController($request, $template, $serviceManager->get(IProductRepository::class));
    return $controller->index();
});

$router->addRoute('home', '/', function ($request, $template) {
    $controller = new DefaultController($request, $template);
    return $controller->index();
});



