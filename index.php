<?php
define('START_TIME', microtime(true));
define('APP', '\app');

require 'bootstrap.php';

$event  = new \sys\event;

$cache  = \sys\cache::getInstance();
$router = \sys\router::getInstance();


$action = $router->action();
$action = $router->rewrite($action);
$params = $router->params();
// $router->filter($params);

$actionclass = (APP .'\\controller\\'. $action);

$controller = new $actionclass;

unset($controllerclass, $controllername);

$controller->init($params);
$controller->run();
$controller->push();

// $event->outputBefore = new \sys\module\debug;
// $event->outputBefore = new \sys\module\gzip;

// $event->outputBefore = $controller->output;
// $controller->output  = $event->outputBefore;

echo $controller->output;

// $event->outputAfter  = new \sys\module\cron;
