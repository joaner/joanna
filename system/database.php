<?php
namespace system;

use \system\super\factory;
use \configure;


final class database implements factory
{
	protected static $instance;

	public static function getInstance($name=null)
	{
		if( is_object(self::$instance) ){
			return self::$instance;
		}	
		switch($name)
		{
			case 'PDO':
			default:
				$dsn  =& configure::$database['dsn'];
				$user =& configure::$database['username'];
				$pswd =& configure::$database['password'];
				$class = '\\PDO';
		}
		
		self::$instance[$name] = new $class($dsn, $user, $pswd);
		return self::$instance[$name];
	}
}
