<?php
namespace system;

use \configure;
use \system\exception\codeException;
use \system\module;

final class event
{

	public static function &__callStatic($name, $box)
	{
		if( is_array($box) && count($box)===1 ){
			$box = $box[0];
		}


		if( isset(configure::$event[$name]) ){
			foreach(configure::$event[$name] as $module){
				$module = module::getInstance($module);
				if( $module->init($name) ){
					$module->run($box);
				}
			}
		}
		
		return $box;
	}
	
}
