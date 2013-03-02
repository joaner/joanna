<?php
namespace sys\cache;

final class file implements \sys\super\cache
{
	public function __construct(&$configure)
	{
		$this->dir = $configure['path'];
	}
	
	public function get($name)
	{
		$this->filename($name);
		if( file_exists($name) ){
			return file_get_contents($name);
		}else{
			return false;
		}
	}
	
	public function set($name, $value)
	{
		$this->filename($name);
		return file_put_contents($name, $value);
	}
	
	private function filename(&$name)
	{
		$name = $this->dir.'/joanercache_'.dechex(crc32($name));
	}
}