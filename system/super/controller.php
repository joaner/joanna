<?php
namespace system\super;

abstract class controller
{
	protected $view;
	public $output;
	
	protected function init($params=null)
	{
		
	}
	
	abstract function run();
	
	public function output()
	{
		if( ! ($this->view instanceof \system\super\view) ){
			throw new Exception('The view class must extends \system\super\view');
		}
		$this->output = (string)$this->view;
	}
}