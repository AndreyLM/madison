<?php

use Aura\Router\RouterContainer;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$domainName = '/madison/public';

$map->get('home', $domainName.'/', function ($request, $response) {
    $id = (int) $request->getAttribute('id');
    $response->getBody()->write("You asked for blog entry {$id}.");
    return $response;
});

$request = ServerRequestFactory::fromGlobals();
$matcher = $routerContainer->getMatcher();

$route = $matcher->match($request);


foreach ($route->attributes as $key => $val) {
    $request = $request->withAttribute($key, $val);
}

$callable = $route->handler;
$response = $callable($request);

$emitter = new SapiEmitter();
$emitter->emit($response);