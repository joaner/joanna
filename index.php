<?php
define('START_TIME', microtime(true));
define('APP', '\app');

require 'sys/event.php';
require 'bootstrap.php';

\sys\module::bind();

$cache  = \sys\cache::getInstance();
$router = \sys\router::getInstance();


$action = $router->action();
$action = $router->rewrite($action);
$params = $router->params();

$actionclass = (APP .'\\controller\\'. $action);

$controller = new $actionclass;

unset($action, $actionclass);

$controller->init($params);
$controller->run();
$controller->push();


$controller->output = \sys\event::outputBefore($controller->output);

echo $controller->output;

