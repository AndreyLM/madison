<?php
/* @var $router IRouter */
/* @var $app \App\Application*/
/* @var $serviceManager ServiceLocatorInterface */


use App\Router\IRouter;
use App\Template\ITemplateRenderer;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stratigility\Middleware\ErrorHandler;
use Zend\Stratigility\Middleware\ErrorResponseGenerator;

$debug = $serviceManager->get('config')['debug'];
$router = $serviceManager->get(IRouter::class);
$template = $serviceManager->get(ITemplateRenderer::class);

$app->pipe(new ErrorHandler(function() {
    return new Zend\Diactoros\Response();
}, new ErrorResponseGenerator($debug)));
$app->pipe(new App\Middlewares\CredentialsMiddleware());
$app->pipe(new App\Middlewares\RouterMiddleware($router, $template));