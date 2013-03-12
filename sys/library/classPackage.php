<?php
namespace sys\library;

final class classPackage implements \sys\super\library
{
	public static function file($class)
	{
		return DIR. '/'. str_replace('\\', '/', $class) .'.php';
	}

	public static function load($class)
	{
		if( class_exists($class, false) ){
			return ;
		}
		$file = self::file($class);
		// defined('EVENT') && $GLOBALS['event']->classLoadBefore = null;
    	require $file;
    	// defined('EVENT') && $GLOBALS['event']->classLoadAfter  = null;
	}

}
