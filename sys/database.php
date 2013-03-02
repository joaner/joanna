<?php
namespace sys;

final class database implements \sys\super\factory
{
	protected static $instance;

	public static function getInstance($name=null)
	{
		
		switch($name)
		{
			case 'PDO':
			default:
				$dsn  =& \configure::$database['dsn'];
				$user =& \configure::$database['username'];
				$pswd =& \configure::$database['password'];
				$class = '\\PDO';
		}
		
		self::$instance[$name] = new $class($dsn, $user, $pswd);
		return self::$instance[$name];
	}
}
