<?php
namespace system\library;

use \system\super\library;
use \system\exception\codeException;
use \system\event;

final class classPackage implements library
{
	public static function file(&$class)
	{
		return DIR. '/'. str_replace('\\', '/', $class) .'.php';
	}

	public static function load($class)
	{
		if( class_exists($class, false) ){
			return ;
		}
		$file = self::file($class);
		if( ! file_exists($file) ){
			throw new codeException();
		}
		$file = event::loadClassBefore($file);
    	require $file;
	}

}
