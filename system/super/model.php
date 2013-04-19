<?php
namespace system\super;

use \system\event;
use \system\exception\codeException;
use \system\library\reflection;


abstract class model implements \system\super\event
{
	// cache expire time for second
	public static $expiretime = 60;
	// param data: "eventname => param"
	public $value = array();

	
	public function &__call($name, $param)
	{
		$ref = new reflection($this, $name);
		if( !$ref->object->isProtected() ){
			throw new CodeException();
		}
	
		$this->setMethod($name);
		$this->setParam($param);

		event::modelExecBefore($this);

		$func = array($this, $this->getMethod());
		$this->setResult( call_user_func($func, $this->getParam()) );

		event::modelExecAfter($this);
		return $this->getResult();
	}


	public function getMethod()
	{
		return $this->method;
	}

	public function getParam()
	{
		return $this->value[$this->method];
	}

	public function getResult()
	{
		return $this->value[$this->method];
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	public function setParam($param)
	{
		$this->value[$this->method] = $param;
	}

	public function setResult($result)
	{
		$this->value[$this->method] = $result;
	}

	public function &_skip_(&$value)
	{
		return $value;
	} 

}
