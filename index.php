<?php
define('START_TIME', microtime(true));
define('APP', '\application');

require 'system/event.php';
require 'config.php';

use \system\event;
use \system\module;
use \system\router;
use \system\cache;

event::listen();


cache::getInstance();
$router = router::getInstance();
$controller = router::getController($router);

$controller->init();
$controller->run();
$controller->push();

