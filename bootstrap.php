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

require 'sys/library/classPackage.php';


function __autoload($classname)
{
	\sys\library\classPackage::load($classname);
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

	public static $module = array(
		'outputBefore' => array(
			'debug'
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
