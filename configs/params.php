<?php

use App\Template\Twig\TwigRouteExtension;

return [
    'debug' => true,
    'basePath' => '/madison/public',
    'template' => 'twig',
    'twig' => [
        'template_dir' => 'Views',
        'cache_dir' => 'var/cache/twig',
        'file_extension' => 'twig',
        'extensions' => [
            TwigRouteExtension::class,
        ]
    ],
    'connection' => [
        'host' => 'db',
        'db'   => 'myDb',
        'user' => 'user',
        'pass' => 'test',
        'charset' => 'utf8'
    ]
];