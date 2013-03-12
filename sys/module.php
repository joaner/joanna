<?php
namespace sys;

final class module
{
	public static function bind()
	{
		foreach(\configure::$module as $event=>&$name){
			if( ! is_array($name) ){
				$name = array($name);
			}
			foreach($name as $module){
				$module = __CLASS__.'\\'. $module;
				\sys\event::addListen($event, $module);
			}
		}
	} 

}
