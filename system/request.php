<?php
namespace system;

use \system\super\factory;
use \configure;



final class request implements factory
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
		$classname = '\\system\\router\\'.$name;
		return new $classname;
	}

	public static function getController(\system\super\router $router)
	{
		$action = $router->action();
		$action = $router->rewrite($action);
		$params = $router->params();

		$actionclass = (APP .'\\controller\\'. $action);

		event::initControllerBefore($actionclass);
		return new $actionclass($params);
	}
}
