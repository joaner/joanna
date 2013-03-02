<?php
namespace sys;

final class database implements \sys\super\factory
{
	protected static $_instance_;
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
		
		self::$_instance_[$name] = new $class($dsn, $user, $pswd);
		return self::$_instance_[$name];
	}
}