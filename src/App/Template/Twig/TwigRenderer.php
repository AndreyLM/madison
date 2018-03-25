<?php
namespace App\Template\Twig;

use App\Template\ITemplateRenderer;
use Psr\Container\ContainerInterface;
use Twig\Environment;

class TwigRenderer implements ITemplateRenderer
{
    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var
     */
    private $extension;
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(Environment $twig, $extension, ContainerInterface $container)
    {
        $this->environment = $twig;
        $this->extension = $extension;
        $this->container = $container;
    }

    public function render($name, array $params)
    {
        return $this->environment->render($name.'.'.$this->extension,
            array_merge_recursive($params, ['baseUrl' => $this->container->get('config')['basePath']]));
    }

}