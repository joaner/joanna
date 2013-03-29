<?php
namespace system\super;

use \system\super\view;
use \system\exception\codeException;

abstract class controller
{
	protected $view;
	public $output;
	
	public function init($params=null)
	{
	}
	
	abstract function run();
	
	public function push()
	{
		if( ! ($this->view instanceof view) ){
			throw new codeException();
		}
		$this->output = (string)$this->view;
	}
}
