<?php

use App\Application;

/* @var $app Application */

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$serviceManager = require 'configs/ServiceManager.php';

$app = $serviceManager->get(Application::class);

require_once 'configs/routes.php';
require_once 'configs/pipes.php';

$app->run();

