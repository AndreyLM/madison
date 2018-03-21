<?php
namespace App;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stratigility\MiddlewarePipeInterface;

class Application
{
    /**
     * @var MiddlewarePipeInterface
     */
    private $middleware;
    /**
     * @var RequestHandlerInterface
     */
    private $defaultHandler;

    private $emitter;
    /**
     * @var ServerRequestInterface
     */
    private $request;

    private $container;

    public function __construct(MiddlewarePipeInterface $middleware,
                                ServerRequestInterface $request,
                                RequestHandlerInterface $defaultHandler,
                                EmitterInterface $emitter)
    {

        $this->middleware = $middleware;
        $this->defaultHandler = $defaultHandler;
        $this->emitter = $emitter;
        $this->request = $request;
    }

    public function run()
    {
        $response = $this->middleware->process($this->request, $this->defaultHandler);
        $this->emitter->emit($response);
    }

    public function pipe(MiddlewareInterface $middleware)
    {
        $this->middleware->pipe($middleware);
    }

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getContainer() {
        return $this->container;
    }
}

