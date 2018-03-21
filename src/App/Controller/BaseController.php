<?php
namespace App\Controller;

use App\Template\ITemplateRenderer;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class BaseController
{
    /**
     * @var ITemplateRenderer
     */
    private $template;
    /**
     * @var ServerRequestInterface
     */
    private $request;

    public function  __construct(ServerRequestInterface $request, ITemplateRenderer $template)
    {

        $this->template = $template;
        $this->request = $request;
    }

    public function renderHtml($view, array $args=[])    {

        return new HtmlResponse($this->template->render($view, $args));
//        return $this->template->render($view, $args);
    }

}