<?php
namespace Controllers;

use Zend\Diactoros\Request;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequest;

class DefaultController
{
    /**
     * @var Request
     */
    private $request;


    public function __construct(ServerRequest $request)
    {
        $this->request = $request;
    }

    public function Index(){
        return new HtmlResponse('hello');
    }
}