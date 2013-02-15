<?php
isset($_SERVER['REQUEST_TIME_FLOAT']) && ($_SERVER['REQUEST_TIME_FLOAT']=microtime(true));
define('START_TIME', $_SERVER['REQUEST_TIME_FLOAT']);

require 'bootstrap.php';



$router = new $CLASS['router'];
$controllername = $router->controller();
$router->location($controllername);

$params = $router->params();
// $router->filter($params);

$controllerclass = APP .'\\controller\\'. $controllername;

$controller = new $controllerclass();

unset($controllerclass, $controllername);

$controller->init($params);
$controller->run();
$controller->output();

$gzip = new \system\module\gzip();
if( $gzip->check() ){
	$gzip->run($controller->output);
}

echo $controller->output;
