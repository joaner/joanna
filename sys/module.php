<?php
namespace sys;

use \configure;
use \sys\event;

final class module
{
	public static function bind()
	{
		foreach(configure::$module as $event=>&$name){
			if( ! is_array($name) ){
				$name = array($name);
			}
			foreach($name as $module){
				$module = __CLASS__.'\\'. $module;
				event::addListen($event, $module);
			}
		}
	} 

}
