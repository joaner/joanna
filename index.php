<?php
isset($_SERVER['REQUEST_TIME_FLOAT']) || ($_SERVER['REQUEST_TIME_FLOAT']=microtime(true));
define('START_TIME', $_SERVER['REQUEST_TIME_FLOAT']);
define('APP', '\app');

require 'bootstrap.php';

$event  = new \sys\event;

$cache  = \sys\cache::getInstance();
$router = \sys\router::getInstance();


$controllername = $router->controller();
$router->location($controllername);

$params = $router->params();
// $router->filter($params);

$controllerclass = (APP .'\\controller\\'. $controllername);

$controller = new $controllerclass();

unset($controllerclass, $controllername);

$controller->init($params);
$controller->run();
$controller->out();

// $event->outputBefore = new \sys\module\debug;
// $event->outputBefore = new \sys\module\gzip;

// $event->outputBefore = $controller->output;
// $controller->output  = $event->outputBefore;
var_dump($controller->output);
echo $controller->output;

// $event->outputAfter  = new \sys\module\cron;
