<?php
namespace App\Controller;

class BaseController
{
    public function  __construct(ITemplateRenderer $template)
    {
        $this->template = $template;
    }

    public function renderHtml($view, array $args)    {

        return new HtmlResponse($this->template->render($view, $args));
    }

}