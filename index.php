<?php
define('START_TIME', microtime(true));
define('APP', '\app');

require 'sys/event.php';
require 'bootstrap.php';

\sys\module::bind();

$cache  = \sys\cache::getInstance();

$router = \sys\router::getInstance();
$controller = \sys\router::getController($router);

$controller->init();
$controller->run();
$controller->push();


$controller->output = \sys\event::outputBefore($controller->output);

echo $controller->output;
