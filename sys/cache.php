<?php
namespace sys;

use \sys\super\factory;
use \configure;


final class cache implements factory
{
	private static $param;
	private static $instance;

	public static function getInstance($name=null)
	{
		if( ! (self::$instance instanceof \sys\super\cache) ){
			switch($name)
			{
				case 'APC':
					if( extension_loaded('APC') ){
						break;
					}
				case 'memcached':
					if( extension_loaded('memcached') ){
						break;
					}
				default:
					$name =& configure::$cache['default'];
			}
		
			$classname = __CLASS__.'\\'.$name;
			if( array_key_exists($name, configure::$cache) ){
				self::$param =& configure::$cache[$name];
			}
			self::$instance = new $classname(self::$param);
		}
		return self::$instance;
	}

}
