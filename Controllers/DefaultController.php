<?php
namespace Controllers;

use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

class DefaultController
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    public function __construct(ServerRequest $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function Index(){
        return new Response\HtmlResponse('hello');
    }
}