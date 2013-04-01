<?php
namespace system\module;

use \system\super\module;
use \system\cache;

final class comment implements module
{

	public function init($event)
	{
		$this->event = $event;
		return true;
	}

	public function run($box)
	{
		switch($this->event){
			case 'modelExecBefore':
				$key = get_class($box).'::'.$box->method;
				$result = cache::get($key);
				if( $result !== false ){
					$box->method = MAGIC_SKIP;
					$box->value[$box->method] = $result;
				}
			break;
			case 'modelExecAfter':
				if( $box->method !== MAGIC_SKIP ){
					$key = get_class($box).'::'.$box->method;
                	cache::set($key, $box->value[$box->method]);
				}
			break;
		}
	}
} 
