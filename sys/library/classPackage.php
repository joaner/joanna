<?php
namespace sys\library;

use \sys\event;


final class classPackage implements \sys\super\library
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
		$file = event::loadClassBefore($file);
    	require $file;
	}

}
