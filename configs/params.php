<?php

use App\Template\Twig\TwigRouteExtension;

return [
    'debug' => false,
    'basePath' => '/madison/public',
    'template' => 'twig',
    'twig' => [
        'template_dir' => 'Views',
        'cache_dir' => 'var/cache/twig',
        'file_extension' => 'twig',
        'extensions' => [
            TwigRouteExtension::class,
        ]
    ]
];