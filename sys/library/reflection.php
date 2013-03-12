<?php
namespace sys\library;

final class reflection implements \sys\super\library
{
	public $object;
	
	private $comments = array();
	
	
	public function __construct($class, $method=null)
	{
		if( is_null($method) ){
			$this->object = new \ReflectionClass($class);
		}else{
			$this->object = new \ReflectionMethod($class, $method);
		}
	}
	
	public function &getComment($name=null)
	{
		if( empty($this->comments) ){
			$doc = $this->object->getDocComment();
			if( $doc !== false){
				$p = '#@([a-z]+)\s+([0-9a-z_-]+)#i';
				if( preg_match_all($p, $doc, $items, PREG_SET_ORDER) ){
					foreach($items as &$item){
						switch( $item[2] ){
							case 'on':
								$item[2] = true;
							break;
							case 'off':
								$item[2] = false;
							break;
						}
						$this->comments[$item[1]] = $item[2];
					}
				}
			}
		}
		
		if( is_null($name) ){
			return $this->comments;
		}else{
			if( !isset($this->comments[$name]) ){
				$this->comments[$name] = null;
			}
			return $this->comments[$name];
		}
		
		
	}
	
}