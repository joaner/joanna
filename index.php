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
scriptcache::$scripts = cache::get(scriptcache::key);

$router = request::getInstance();
$controller = request::getController($router);

$controller->init();
$controller->run();
$controller->push();


scriptcache::destruct();
