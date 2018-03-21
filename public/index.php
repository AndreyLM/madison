<?php

use App\Router\AuraRouterAdapter;
use Aura\Router\RouterContainer;
use Controllers\DefaultController;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$routerContainer = new RouterContainer();
$auraAdapter = new AuraRouterAdapter($routerContainer);

$auraAdapter->addRoute('home', $domainName.'/', function ($request, $response) {
    $controller = new DefaultController($request, $response);
    return $controller->Index();
});;


$map = $routerContainer->getMap();

$domainName = '/madison/public';

$map->get('home', $domainName.'/', function ($request, $response) {
    $controller = new DefaultController($request, $response);
    return $controller->Index();
});

$response = new Response();
$request = ServerRequestFactory::fromGlobals();
$matcher = $routerContainer->getMatcher();

$route = $matcher->match($request);


foreach ($route->attributes as $key => $val) {
    $request = $request->withAttribute($key, $val);
}

$callable = $route->handler;
$response = $callable($request, $response);

$emitter = new SapiEmitter();
$emitter->emit($response);