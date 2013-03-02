<?php
namespace sys\super;

abstract class model
{
	// cache expire time for second
	const expiretime = 60;
	// param data: "eventname => param"
	private $__value__ = array();

	
	public function __call($name, $param)
	{
		if( ! method_exists($this, $name) ){
			throw new CodeException();
		}
		
		$ref = new \ReflectionMethod($this, $name);
		if( $ref->isStatic() || !$ref->isProtected() ){
			throw new CodeException();
		}
		
		global $cache, $event;
		$classpackage = new \sys\library\classpackage;
		$file = $classpackage->file(get_class($this));

		if( TIME - filemtime($file) > 36000 ){
			$key = __CLASS__.'::'. $name;
			$event->modelGetCacheBefore = $key;
			$data = $cache->get($key);
			$event->modelGetCacheAfter  = $data;
			if( $data !== false ){
				return $data;
			}
		}
		$this->__value__[$name] = $param;

		$doc = $ref->getDocComment();
		if( preg_match_all('#@([a-z]+)\s+([0-9a-z_-]+)#', $doc, $cachesets, PREG_SET_ORDER) ){
			foreach($cachesets as $cacheset){
				switch($cacheset[1])
				{
					case 'expire':
						$expiretime = (int)$cacheset[2];
					break;
					case 'cache':
						if($cacheset[2]==='no-cache'){
							$expiretime = 0;
							break 2;
						}else{
							$type = $cacheset[2];
						}
					break;
				}
			}
		}else{
			$expiretime = static::$expiretime;
		}
		

		$event->modelExecBefore = $name;
		$data = $this->$name($this->__value__[$name]);
		$event->modelExecAfter  = $data;

		if( $expiretime > 0 ){
			$event->modelSetCacheBefore = array($key, $expiretime);
			$result = $GLOBALS['cache']->set($key, $data, $expiretime);
			$event->modelSetCacheAfter  = $result;
		}
		
		return $data;
	}

}
