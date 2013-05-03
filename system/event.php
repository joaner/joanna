<?php
namespace system;

use \configure;
use \system\exception\codeException;
use \system\module;

final class event
{
	private static $events = array(
		'modelExecBefore'	=> null,
		'modelExecAfter'	=> null,
		'outputBefore'		=> null,
		);


	public static function listen()
	{
		if( ! $events = cache::get('events_listen') ){
			$events = self::getListenObject(self::$events);
			cache::set('events_listen', $events);
		}
		self::$events = $events;
	}

	public static function __callStatic($name, array $object)
	{
		$result = null;
		if( isset(self::$events[$name]) ){
			foreach(self::$events[$name] as $class){
				$callback	= array(module::getInstance($class), $name);
				$result 	= call_user_func_array($callback, $object);
			}
		}
		return $result;
	}


	private static function getListenObject(array $events)
	{
		foreach(glob(DIR.'/system/module/*.php') as $filename){
			$class = '\\system\\module\\'. pathinfo($filename, PATHINFO_FILENAME);

			if( class_exists($class) ){
				$ref = new \system\library\reflection(new $class);
				$methods = $ref->getMethods('PUBLIC');

				foreach($methods as $method){
					$name  = $method->name;
					$class = $method->class;
					if( array_key_exists($name, $events) ){
						if( ! is_array($events[$name]) ){
							$events[$name] = array();
						}
						$events[$name][] = $class;
					}
				}
			}
		}

		return $events;
	}

}
