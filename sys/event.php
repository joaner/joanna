<?php
namespace sys;

final class event
{
	private $classLoadBefore;
	private $classLoadAfter;
	
	private $outputBefore;
	private $outputAfter;
	
	private $__value__;
	
	public function __construct()
	{
		define('EVENT', true);
	}
	
	public function __set($event, $data)
	{
		if( ! property_exists($this, $event) ){
			return ;
			throw new CodeException();
		}
		if( is_object($data) && $data instanceof \sys\super\module ){
			if( empty($this->$event) ){
				$this->{$event} = array();
			}
			$this->{$event}[] = $data;	
		}else{
			if( empty($this->$event) ){
				if( ! is_null($data) ){
					throw new ParamException('you need first set the callback');
				}
			}
			$this->__value__[$event] = $data;
			foreach($this->$event as $call){
				$call->run($this->__value__[$event]);
			}
		}
		
	}
	
	public function &__get($event)
	{
		if( ! array_key_exists($event, $this->__value__) ){
			throw new CodeException();
		}
		return $this->__value__[$event];
	}
	
}