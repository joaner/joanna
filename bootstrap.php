<?php
/**
 * @namespace \
 */

define('PATH', '/joanna');
define('DIR', __DIR__);

define('TMP_DIR', sys_get_temp_dir());
define('TIME', time());

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);


function __autoload($classname)
{
	// defined('EVENT') && $GLOBALS['event']->classLoadBefore = null;
	$file = str_replace('\\', '/', $classname);
	require $file . '.php';
	// defined('EVENT') && $GLOBALS['event']->classLoadAfter  = null;
}


final class configure
{
	public static $router = array(
		'' => 'index',
		'__404__' => 'page404'
	);
	
	public static $cache = array(
		'file' => array(
			'time' => 3600,
			'path' => TMP_DIR
		)
	);
	
	public static $database = array(
		
		'dsn' => 'sqlite:/opt/database/joanna.sq3',// 'sqlite::memory:',
		'username' => null,
		'password' => null,
		/*
		 * 
		'dsn' => 'mysql:localhost;dbname=events',
		'username' => 'root',
		'password' => 'chilema'
		*/
	);

}
