<?php
namespace system;

use \system\super\factory;
use \configure;


final class cache implements \system\super\factory
{
	const expiretime = 3600;

	private static $instance;

	public static function getInstance($name=null)
	{
		if( ! (self::$instance instanceof cache) ){
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
			
			if( ! isset(configure::$cache[$name]) ){
				configure::$cache[$name] = null;
			}
			self::$instance = new $classname(configure::$cache[$name]);
		}

		return self::$instance;
	}


	public static function set($name, &$data, $lifetime=self::expiretime)
	{
		if( $lifetime ){
			self::$instance->expire = $lifetime;
		}
		self::$instance->{$name} = $data;
	}

	public static function get($name)
	{
		return self::$instance->{$name};
	}

}
