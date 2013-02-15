<?php
namespace system\super;

abstract class model
{
	public function __call($name, $param)
	{
		if( defined('CACHE') && class_exists(CACHE) ){
			$data = $GLOBALS['cache']->get($name);
			if( $data !== null ){
				return $data;
			}
		}
		$this->$name($param);
	}
}