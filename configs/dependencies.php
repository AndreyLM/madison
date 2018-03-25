<?php


use App\Application;
use App\Middlewares\NotFoundHandler;
use App\Router\IRouter;
use App\Template\ITemplateRenderer;
use App\Template\Twig\TwigRenderer;
use Aura\Router\RouterContainer;
use Models\Repositories\IProductRepository;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\Stratigility\MiddlewarePipe;

return [
    'abstract_factories' => [
        Zend\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory::class
    ],
    'factories' => [
       Application::class => function(ContainerInterface $container) {
           $app = new Application(new MiddlewarePipe(),
               ServerRequestFactory::fromGlobals(),
               new NotFoundHandler(),
               new SapiEmitter());
           $app->setContainer($container);

           return $app;

       },
        IProductRepository::class => function(ContainerInterface $container) {
            return new \Models\Repositories\PDOProductRepository($container->get('config')['connection']);
        },
       IRouter::class => function(ContainerInterface $container) {
            $basePath = $container->get('config')['basePath'];
            return new \App\Router\AuraRouterAdapter(new RouterContainer($basePath));
       },
        ITemplateRenderer::class => function(ContainerInterface $container) {

            if($container->get('config')['template'] === 'twig')
                return $container->get(TwigRenderer::class);
            throw new ServiceNotFoundException('Cannot find appropriate template engine');
        },
        TwigRenderer::class => function(ContainerInterface $container) {
            $debug = $container->get('config')['debug'];
            $config = $container->get('config')['twig'];

            $loader = new Twig\Loader\FilesystemLoader();
            $loader->addPath($config['template_dir']);

            $environment = new Twig\Environment($loader, [
                'cache' => $debug ? false : $config['cache_dir'],
                'strict_variables' => $debug,
                'auto_reload' => $debug,
            ]);

            if ($debug) {
                $environment->addExtension(new Twig\Extension\DebugExtension());
            }


            foreach ($config['extensions'] as $extension) {
                $environment->addExtension($container->get($extension));
            }

            return new TwigRenderer($environment,
                $config['file_extension'], $container);
        },
    ],
];