<?php
namespace system;

use \system\super\factory;
use \configure;



final class router implements factory
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
					$name =& configure::$router['default'];
			}
		}
		$classname = __CLASS__.'\\'.$name;
		return new $classname;
	}

	public static function getController(\system\super\router $router)
	{
		$action = $router->action();
		$action = $router->rewrite($action);
		$params = $router->params();

		$actionclass = (APP .'\\controller\\'. $action);

		return new $actionclass($params);
	}
}
