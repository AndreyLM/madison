<?php
namespace Controllers;

use App\Controller\BaseController;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequest;

class DefaultController extends BaseController
{

    public function Index(){
        return $this->renderHtml('index');
    }
}