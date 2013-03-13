<?php
namespace sys;

final class event
{
	const classLoadBefore = 'output';
	const classLoadAfter  = '';
	
	const outputBefore = 'boolean';
	const outputAfter  = 'boolean';
	

	private static $__listen__ = array();


	public static function addListen($event, $module)
	{
		self::$__listen__[$event][] = $module;
	}

	public static function &__callStatic($event, $data)
	{
		if( ! defined(__CLASS__.'::'.$event) ){
			throw new CodeException();
		}
		if( ! isset(self::$__listen__[$event]) ){
			return $data;
		}

		foreach(self::$__listen__[$event] as &$module){
			if( $module::check() === true ){
				$module = new $module;
				$continue = $module->run($data, $event);
				if( $continue === false ){
					unset($module);
				}
			}
		}
		return $data[0];
	}
	
}
