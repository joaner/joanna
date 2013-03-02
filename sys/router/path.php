<?php
namespace sys\router;


final class path implements \sys\super\router
{
	public function action()
	{
		$path = $this->getPath();
		return $path;
	}

	public function params()
	{
		return $_GET;
	}
	
	public function rewrite($action)
	{
		if( array_key_exists($action, \configure::$router['rule']) ){
			$action = \configure::$router['rule'][$action];
		}
		return $action;
	}	

	private function getPath()
	{
		$path = $_SERVER['REQUEST_URI'];
		if(strpos($path, PATH) === 0 ){
			$path = substr($path, strlen(PATH));
		}
		$path = trim($path, '/');
		return $path;
	}

}
