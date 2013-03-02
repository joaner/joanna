<?php
namespace sys\super;

abstract class router
{
	/**
	 * return the controller class name
	 * @return string
	 */
	abstract function controller();
	
	/**
	 * return the controller params
	 * @return array
	 */
	abstract function params();
	
	
	public function location(&$controller)
	{
		if( array_key_exists($controller, \configure::$router) ){
			$controller = \configure::$router[$controller];
		}
	}
	
}
