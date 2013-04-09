<?php
namespace system\super;

use \system\super\view;
use \system\event;


abstract class controller
{
	protected $view;
	public $output;	


	public function init($params=null)
	{
		define('VIEW', $this->view);
		$this->view = "\\application\\view\\{$this->view}";
		$this->view = new $this->view($this);
	}
	
	abstract function run();
	

	public function push()
	{
		if( ! is_null($this->view) ){
			$this->output = (string)$this->view;
			event::outputBefore($this);
			echo $this->output;
		}
	}
}
