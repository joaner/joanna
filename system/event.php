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
		);


	public static function listen()
	{
		foreach(glob(DIR.'/system/module/*.php') as $filename){
			$class = '\\system\\module\\'. pathinfo($filename, PATHINFO_FILENAME);

			if( class_exists($class) ){
				$ref = new \system\library\reflection(new $class);
				$methods = $ref->getMethods('PUBLIC');

				foreach($methods as $method){
					$name  = $method->name;
					$class = $method->class;
					if( array_key_exists($name, self::$events) ){
						if( ! is_array(self::$events[$name]) ){
							self::$events[$name] = array();
						}
						self::$events[$name][] = $class;
					}
				}
			}
		}
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

}
