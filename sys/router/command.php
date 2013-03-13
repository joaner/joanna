<?php
namespace sys\router;


final class command implements \sys\super\router
{
	public function action()
	{
		global $argv;
		
		$controller = 'index';
		if( isset($argv[1]) ){
			$controller = $argv[1];
			if( isset($argv[2]) && $argv[2]!=='NULL' ){
				$controller .= '\\'.$argv[2];
			}
		}
		return $controller;
	}
	
	public function params()
	{
		global $argv;
		
		return array_slice($argv, 3);
	}
	
	public function rewrite($action)
	{

	}
}
