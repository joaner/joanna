<?php
namespace system\library;

use \system\super\library;
use \system\event;

final class classPackage implements library
{
	public static $file;
	public static $class;

	public static function file($class)
	{
		return DIR. '/'. str_replace('\\', '/', $class) .'.php';
	}

	public static function load($class)
	{
		if( class_exists($class, false) ){
			return ;
		}
		self::$class[] = $class;
		self::$file = self::file($class);
if( ! file_exists(self::$file) )
	var_dump( (new \Exception())->getTrace() );
		event::loadClassBefore(__CLASS__);
    	require self::$file;
	}

}
