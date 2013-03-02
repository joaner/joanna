<?php
namespace sys;

final class router implements \sys\super\factory
{	
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
					$name =& \configure::$router['default'];
			}
		}
		$classname = __CLASS__.'\\'.$name;
		return new $classname;
	}
}
