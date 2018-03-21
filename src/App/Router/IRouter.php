<?php
namespace App\Router;

use App\Router\Exception\RequestNotMatchedException;
use App\Router\Exceptions\RouteNotFoundException;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/21/18
 * Time: 5:33 AM
 */

interface IRouter
{
    /**
     * @param ServerRequestInterface $request
     * @throws RequestNotMatchedException
     * @return Result
     */
    public function match(ServerRequestInterface $request): Result;

    /**
     * @param $name
     * @param array $params
     * @throws RouteNotFoundException
     * @return string
     */
    public function generate($name, array $params): string;

    public function addRoute($name, $path, $handler, $methods, $options) : void;
}