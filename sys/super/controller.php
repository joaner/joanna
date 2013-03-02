<?php
namespace sys\super;

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
		if( ! ($this->view instanceof \sys\super\view) ){
			throw new CodeException();
		}
		$this->output = (string)$this->view;
	}
}
