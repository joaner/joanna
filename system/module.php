<?php
namespace system;

use \system\super\factory;

final class module implements factory
{
	private static $instance = array();

	public static function getInstance($name=null)
	{
		if( ! isset(self::$instance[$name]) ){
			$classname = __CLASS__ .'\\'. $name;
			if( ! class_exists($classname) ){
				return false;
			}
			self::$instance[$name] = new $classname;
		}

		return self::$instance[$name];
	} 

}
