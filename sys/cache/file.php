<?php
namespace sys\cache;

final class file implements \sys\super\cache
{
	private $__value__ = array();
	private $dir;

	public function __construct(&$configure)
	{
		$this->dir = $configure['path'];
	}
	
	public function &__get($name)
	{
		if( ! array_key_exists($name, $this->__value__) ){
			$filename = $this->filename($name);
			if( file_exists($filename) ){
				$this->__value__[$name] = file_get_contents($filename);
			}else{
				$this->__value__[$name] = false;
			}
		}
		return $this->__value__[$name];
	}
	
	public function __set($name, $value)
	{
		$this->__value__[$name] = $value;
		$filename = $this->filename($name);
		return file_put_contents($filename, $value);
	}
	
	private function filename(&$name)
	{
		return $this->dir.'/joanercache_'.dechex(crc32($name));
	}
}
