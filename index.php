<?php
define('START_TIME', microtime(true));
define('APP', '\application');

require 'system/event.php';
require 'config.php';

use \system\event;
use \system\module;
use \system\request;
use \system\cache;

cache::getInstance();

$router = request::getInstance();
$controller = request::getController($router);

$controller->init();
$controller->run();
$controller->push();
