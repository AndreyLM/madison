<?php
namespace App\Template;

interface ITemplateRenderer
{
    public function render($name, array $params);

}