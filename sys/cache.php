<?php
namespace sys;

final class cache implements \sys\super\factory
{
	private static $default = 'file';
	private static $param;
	
	public static function getInstance($name=null)
	{
		if( extension_loaded('APC') ){
			$class = 'APC';
		}elseif( extension_loaded('memcached') ){
			$class = 'memcached';
		}else{
			$class = self::$default;
		}
		
		$classname = __CLASS__.'\\'.$class;
		if( array_key_exists($class, \configure::$cache) ){
			self::$param =& \configure::$cache[$class];
		}
		return new $classname(self::$param);
	}

}