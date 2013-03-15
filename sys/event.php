<?php
namespace sys;

final class event
{
	const loadClassBefore = 'output';
	const loadClassAfter  = '';

	const modelExecBefore = '';
	const modelExecAfter = '';
	
	const outputBefore = 'boolean';
	const outputAfter  = 'boolean';
	
	private static $__listen__ = array();

	public static function addListen($event, $module)
	{
		self::$__listen__[$event][] = $module;
	}

	public static function &__callStatic($event, $box)
	{
		if( ! defined(__CLASS__.'::'.$event) ){
			throw new CodeException();
		}
		
		if( is_array($box) &&  count($box)===1 ){
			$box = $box[0];
		}

		if( isset(self::$__listen__[$event]) ){
			foreach(self::$__listen__[$event] as &$module){
				if( $module::check() === true ){
					if( ! is_object($module) ){
						$module = new $module;
					}
					$module->run($event, $box);
				}
			}
		}
		
		return $box;
	}
	
}
