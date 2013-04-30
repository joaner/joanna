<?php
namespace system;

use \system\super\factory;

final class module implements factory
{
	private static $instance = array();

	public static function getInstance($classname=null)
	{
		if( ! isset(self::$instance[$classname]) ){
			if( ! class_exists($classname) ){
				return false;
			}
			self::$instance[$classname] = new $classname;
		}
		return self::$instance[$classname];
	} 

}
