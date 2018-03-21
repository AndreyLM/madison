<?php
/* @var $router \App\Router\IRouter */
/* @var $app \App\Application*/
/* @var $serviceManager ServiceLocatorInterface */


use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stratigility\Middleware\ErrorHandler;
use Zend\Stratigility\Middleware\ErrorResponseGenerator;

$debug = $serviceManager->get('config')['debug'];

$app->pipe(new ErrorHandler(function() {
    return new Zend\Diactoros\Response();
}, new ErrorResponseGenerator($debug)));
$app->pipe(new App\Middlewares\CredentialsMiddleware());
$app->pipe(new App\Middlewares\RouterMiddleware($router));