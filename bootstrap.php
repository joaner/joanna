<?php
namespace {

	define('PATH', '/joanna');
	define('DIR', __DIR__);
	define('APP', '\app');
	
	$CLASS = array();
	$CLASS['router'] = 'system\\router\\dispatch';
	$CLASS['cache']  = 'system\\cache\\file';
	
	function __autoload($classname)
	{
		$file = str_replace('\\', '/', $classname);
		require $file . \configure::EXT;
	}

	
	final class configure
	{
		const EXT = '.php';
		
		public static $router = array(
				'' => 'index',
				'__404__' => 'page404'
		);
		
		public static $database = array(
				'dsn' => 'mysql:localhost;dbname=events',
				'username' => 'root',
				'password' => 'chilema'
		);
		
	}
	
}
