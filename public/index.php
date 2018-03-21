<?php

use App\Router\AuraRouterAdapter;
use App\Router\Exceptions\RequestNotMatchedException;
use Aura\Router\RouterContainer;
use Controllers\DefaultController;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$domainName = '/madison/public';

$router = new AuraRouterAdapter($routerContainer);


$router->addRoute('home', $domainName.'/', function ($request, $response) {
    $controller = new DefaultController($request, $response);
    return $controller->Index();
});;


$request = ServerRequestFactory::fromGlobals();
$response = new \Zend\Diactoros\Response();

try {
    $result = $router->match($request);

    foreach ($result->getAttributes() as $attribute=>$value) {
        $request = $request->withAttribute($attribute, $value);
    }

    $action = $result->getHandler();
    $response = $action($request, $response);

} catch (RequestNotMatchedException $e) {
    $response = new HtmlResponse('Undefined page 2', 404);
}

//
//$map = $routerContainer->getMap();
//
//$domainName = '/madison/public';
//
//$map->get('home', $domainName.'/', function ($request, $response) {
//    $controller = new DefaultController($request, $response);
//    return $controller->Index();
//});
//
//$response = new Response();
//$request = ServerRequestFactory::fromGlobals();
//$matcher = $routerContainer->getMatcher();
//
//$route = $matcher->match($request);
//
//
//foreach ($route->attributes as $key => $val) {
//    $request = $request->withAttribute($key, $val);
//}
//
//$callable = $route->handler;
//$response = $callable($request, $response);

$emitter = new SapiEmitter();
$emitter->emit($response);