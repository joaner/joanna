<?php
namespace system\cache;

use \system\super\cache;
use \system\library\export;

final class file implements cache
{
	private $store = array();
	private $dir;

	public $lifetime = 0;
	public $note = array();


	public function __construct(&$configure)
	{
		$this->dir = $configure['path'];
	}
	
	public function &__get($name)
	{
		if( ! array_key_exists($name, $this->store) ){
			$filename = $this->filename($name);
			if( file_exists($filename) ){
				$this->store[$name] = include $filename;
				if( isset($lifetime) && $filetime < TIME ){
					$this->store[$name] = false;
				}
			}else{
				$this->store[$name] = false;
			}
		}
		return $this->store[$name];
	}
	
	public function __set($name, $content)
	{
		$this->store[$name] = $content;
		$filename = $this->filename($name);
		if( $this->lifetime > 0 ){
			$this->note['lifetime'] = TIME + self::$filetime;
		}
		$content = export::script($content, $this->note);
		$result = file_put_contents($filename, $content);
		
		return $result;
	}
	
	private function filename($name)
	{
		return $this->dir.'/joanercache_'.dechex(crc32($name));
	}
}
