<?php
namespace system\library;

use \system\super\library;
use \system\event;

final class classPackage implements library
{
	public static $file;
	public static $class = array();

	public static function load($class)
	{
		if( class_exists($class, false) || interface_exists($class, false) ){
			return ;
		}

		self::$file = self::file($class);
    	require self::$file;
	}

	public static function file($class)
    {
        return DIR. '/'. str_replace('\\', '/', $class) .'.php';
    }

}
