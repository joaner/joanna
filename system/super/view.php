<?php
namespace system\super;

use \system\super\controller;

abstract class view
{
	protected $layout;
	protected $controller;
	
	public function __construct(controller $controller)
	{
		$this->controller = $controller;
	}
	
	public function &__get($name)
	{
		return $this->controller->{$name};
	}
	
	public function __isset($name)
	{
		return isset($this->controller->{$name});
	}
	
	public function __toString()
	{
		ob_start();
		require DIR.'/'.str_replace('\\', '/', get_class($this)).'/layout.php';
		$str = ob_get_contents();
		ob_end_clean();
		return $str;
	}
}
