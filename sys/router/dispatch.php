<?php
namespace sys\router;


final class dispatch extends \sys\super\router
{
	public function controller()
	{
		$path = $this->getPath();
		return $path;
	}

	public function params()
	{
		return $_GET;
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
