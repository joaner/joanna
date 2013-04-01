<?php
// @namespace \

use \system\library\classPackage;
use \system\cache;

define('PATH', '/joanna');
define('DIR', __DIR__);

define('STATIC_PATH', PATH.'/static');

define('TMP_DIR', sys_get_temp_dir());
define('TIME', time());

define('MAGIC_SKIP', '__skip__');


error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);


require 'system/library/classPackage.php';


function __autoload($classname)
{
	if( isset(scriptcache::$scripts[$classname]) ){
		require scriptcache::$scripts[$classname];
	}else{
		classPackage::load($classname);
	}
}



final class scriptcache
{
	const key = 'scriptSummaryCache';

	public static $scripts = null;
	public static $update  = array();

	public static function destruct()
	{
		if( count(self::$update) > 0 ){
			foreach(self::$update as $class){
				$file = classPackage::file($class);
				self::$scripts[$class] = \system\library\export::rfc2397($file);
			}
			cache::set(self::key, self::$scripts);
		}
	}
}

final class configure
{
	public static $router = array(
		'default' => 'path',
		'rule' => array(
			'' => 'index',
			'__404__' => 'page404'
		)
	);

	public static $event = array(
		'outputBefore' => array(
			'debug'// , 'gzip'
			),
		'modelExecBefore' => array(
			'comment'
			),
		'modelExecAfter' => array(
			'comment'
			),
	);

	public static $cache = array(
		'default' => 'file',
		'file' => array(
			'time' => 3600,
			'path' => TMP_DIR
		)
	);
	
	public static $database = array(
		'dsn' => 'sqlite:/opt/database/joanna.sq3',
		'username' => null,
		'password' => null,
		/*
		'dsn' => 'mysql:localhost;dbname=events',
		'username' => 'root',
		'password' => 'chilema'
		*/
	);

}
