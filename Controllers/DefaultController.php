<?php
namespace Controllers;

use Zend\Diactoros\Request;
use Zend\Diactoros\Response;

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

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function Index(){

    }
}