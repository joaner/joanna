<?php
namespace system;

use \configure;
use \system\exception\codeException;
use \system\module;

final class event
{

	public static function __callStatic($name, array $object)
	{
		$object = array_shift($object);
		if( isset(configure::$event[$name]) ){
			foreach(configure::$event[$name] as $module){
				$module = module::getInstance($module);
				if( $module && $module->init($name) ){
					$module->run($object);
				}
			}
		}
	}

}
