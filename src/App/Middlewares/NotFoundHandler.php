<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/21/18
 * Time: 9:48 AM
 */

namespace App\Middlewares;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

class NotFoundHandler implements RequestHandlerInterface
{

    /**
     * Handle the request and return a response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        echo 'die;';
        die;
        return new HtmlResponse('Undefined page', 404);
    }

}