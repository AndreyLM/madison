<?php
namespace Controllers;

use App\Controller\BaseController;


class DefaultController extends BaseController
{

    public function index(){
        return $this->renderHtml('index');
    }
}