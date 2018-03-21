<?php

use App\Router\IRouter;
use Controllers\DefaultController;
use Zend\ServiceManager\ServiceLocatorInterface;

/* @var $serviceManager ServiceLocatorInterface */

$router = $serviceManager->get(IRouter::class);

$router->addRoute('home', '/', function ($request) {
    $controller = new DefaultController($request);
    return $controller->Index();
});;