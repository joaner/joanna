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
	
	public function out()
	{
		if( ! ($this->view instanceof \sys\super\view) ){
			throw new Exception('The view class must extends \sys\super\view');
		}
		$this->output = (string)$this->view;
	}
}