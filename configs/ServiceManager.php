<?php

use Zend\ServiceManager\ServiceManager;

$params = require_once 'params.php';
$dependencies = require_once 'dependencies.php';

$serviceManager = new ServiceManager($dependencies);
$serviceManager->setService('config', $params);

return $serviceManager;