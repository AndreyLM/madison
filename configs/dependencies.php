<?php


use App\Application;
use App\Middlewares\NotFoundHandler;
use App\Router\IRouter;
use Aura\Router\RouterContainer;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Stratigility\MiddlewarePipe;

return [
    'abstract_factories' => [
        Zend\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory::class
    ],
    'factories' => [
       Application::class => function(ContainerInterface $container) {
           return new Application(new MiddlewarePipe(),
               ServerRequestFactory::fromGlobals(),
               new NotFoundHandler(),
               new SapiEmitter());
       },
       IRouter::class => function(ContainerInterface $container) {
            $basePath = $container->get('config')['basePath'];
            return new \App\Router\AuraRouterAdapter(new RouterContainer($basePath));
       }
    ],
];