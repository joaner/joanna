<?php
define('START_TIME', microtime(true));
define('APP', '\application');

require 'config.php';


$controller->init();
$controller->run();
$controller->push();
