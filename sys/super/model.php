<?php
namespace sys\super;

abstract class model
{
	// cache expire time for second
	public static $expiretime = 60;
	// param data: "eventname => param"
	private $__value__ = array();

	
	public function __call($name, $param)
	{
		if( ! method_exists($this, $name) ){
			throw new CodeException();
		}
		
		$ref = new \sys\library\reflection($this, $name);
		if( !$ref->object->isProtected() ){
			throw new CodeException();
		}
		
		global $cache, $event;
		$classpackage = new \sys\library\classpackage;
		$file = $classpackage->file(get_class($this));

		if( TIME - filemtime($file) > 36000 ){
			$key = __CLASS__.'::'. $name;
			$data = $cache->$key;
			if( $data !== false ){
				return $data;
			}
		}
		
		$this->__value__[$name] = $param;
		$event->modelExec = $name;
		$data = $this->$name($this->__value__[$name]);
		
		
		$cacheset = $ref->getComment('cache');
		if( $cacheset !=='no-cache' ){
			$expiretime = $ref->getComment('expire');
			if( is_null($expiretime) ){
				$expiretime = static::$expiretime;
			}
			
			$cache->$key = $data;
		}

		return $data;
	}

}
