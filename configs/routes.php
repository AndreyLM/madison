<?php

use App\Router\IRouter;
use Controllers\ConfigController;
use Controllers\DefaultController;
use Controllers\ProductController;
use Models\Repositories\IProductRepository;
use Zend\ServiceManager\ServiceLocatorInterface;

/* @var $serviceManager ServiceLocatorInterface */

$router = $serviceManager->get(IRouter::class);

$router->addRoute('get_chart_data', '/product/api/chart/{id}', function ($request, $template)use ($serviceManager){
    $controller = new ProductController($request, $template, $serviceManager->get(IProductRepository::class));
    return $controller->getChartDate();
});

$router->addRoute('configs_create_tables', '/config/create/tables', function ($request, $template)use ($serviceManager){
    $controller = new ConfigController($request, $template, $serviceManager);
    return $controller->createTables();
});

$router->addRoute('configs_remove_tables', '/config/remove/tables', function ($request, $template)use ($serviceManager){
    $controller = new ConfigController($request, $template, $serviceManager);
    return $controller->removeTables();
});

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



