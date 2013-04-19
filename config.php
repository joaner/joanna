<?php
// @namespace \

use \system\library\classPackage;
use \system\cache;

define('PATH', '/joanna');
define('DIR', __DIR__);

define('STATIC_PATH', PATH.'/static');

define('TMP_DIR', sys_get_temp_dir());
define('TIME', time());

define('MAGIC_SKIP', '_skip_');


error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);


require 'system/library/classPackage.php';


function __autoload($classname)
{
	classPackage::load($classname);
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

			),
		'modelExecAfter' => array(
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
