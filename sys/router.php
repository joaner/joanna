<?php
namespace sys;

final class router implements \sys\super\factory
{
	
	private static $default = 'dispatch';
	private static $param;
	
	
	/**
	 * 
	 * @return object	new \sys\router\*
	 */
	public static function getInstance($name=null)
	{
		if( is_null($name) ){
			switch( php_sapi_name() )
			{
				case 'cli':
					$name = 'command';
				break;
				case 'cgi-fcgi':
				default:
					$name = 'dispatch';
			}
		}
		$classname = __CLASS__.'\\'.$name;
		if( property_exists('\configure', __CLASS__) ){
			self::$param =& \configure::${__CLASS__};
		}
		return new $classname(self::$param);
	}
	

}