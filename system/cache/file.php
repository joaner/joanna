<?php
namespace system\cache;

use \system\super\cache;


final class file implements cache
{
	private $store = array();
	private $dir;

	public function __construct(&$configure)
	{
		$this->dir = $configure['path'];
	}
	
	public function &__get($name)
	{
		if( ! array_key_exists($name, $this->store) ){
			$filename = $this->filename($name);
			if( file_exists($filename) ){
				$this->store[$name] = file_get_contents($filename);
			}else{
				$this->store[$name] = false;
			}
		}
		return $this->store[$name];
	}
	
	public function __set($name, $value)
	{
		$this->store[$name] = $value;
		$filename = $this->filename($name);
		return file_put_contents($filename, $value);
	}
	
	private function filename(&$name)
	{
		return $this->dir.'/joanercache_'.dechex(crc32($name));
	}
}
