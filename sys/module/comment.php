<?php
namespace sys\module;

final class comment implements \sys\super\module
{

	public static function check()
	{
		return true;
	}

	public function run($event, &$box)
	{
		switch($event){
			case 'modelExecBefore':
				global $cache;
				$key = get_class($box).'::'.$box->method;
				$result = $cache->$key;
				if( $result !== false ){
					$box->method = SKIP;
					$box->value[$box->method] = $result;
				}
			break;
			case 'modelExecAfter':
				if( $box->method !== SKIP ){
					global $cache;
					$key = get_class($box).'::'.$box->method;
                	$cache->$key = $box->value[$box->method];
				}
			break;
		}
	}
} 
