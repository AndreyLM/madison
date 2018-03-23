<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/21/18
 * Time: 5:38 AM
 */

namespace App\Router;


use App\Router\Exceptions\RequestNotMatchedException;
use App\Router\Exceptions\RouteNotFoundException;
use Aura\Router\Exception\RouteNotFound;
use Aura\Router\Route;
use Aura\Router\RouterContainer;
use Psr\Http\Message\ServerRequestInterface;

class AuraRouterAdapter implements IRouter
{

    /**
     * @var RouterContainer
     */
    private $aura;

    public function __construct(RouterContainer $aura)
    {

        $this->aura = $aura;
    }

    /**
     * @param ServerRequestInterface $request
     * @return Result
     */
    public function match(ServerRequestInterface $request): Result
    {
        $matcher = $this->aura->getMatcher();

//        echo var_dump($matcher); die;
        if($route = $matcher->match($request)) {
            return new Result($route->name, $route->handler, $route->attributes);
        }

        throw new RequestNotMatchedException($request);
    }

    /**
     * @param $name
     * @param array $params
     * @return string
     */
    public function generate($name, array $params): string
    {
        $generator = $this->aura->getGenerator();
        try {
            return $generator->generate($name, $params);
        } catch (RouteNotFound $exception) {
            throw new RouteNotFoundException($name, $params, $exception);
        }
    }

    /**
     * @param $name
     * @param $path
     * @param $handler
     * @param $methods
     * @param $options
     */
    public function addRoute($name, $path, $handler, $methods = ['GET'], $options = []): void
    {


        $route = new Route();

        $route->name($name);
        $route->path($path);
        $route->handler($handler);


        foreach ($options as $name => $value) {
            switch ($name) {
                case 'tokens':
                    $route->tokens($value);
                    break;
                case 'defaults':
                    $route->defaults($value);
                    break;
                case 'wildcard':
                    $route->wildcard($value);
                    break;
                default:
                    throw new \InvalidArgumentException('Undefined option "' . $name . '"');
            }
        }

        $route->allows($methods);

        $this->aura->getMap()->addRoute($route);
    }
}