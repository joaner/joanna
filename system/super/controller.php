<?php
namespace system\super;

use \system\super\view;
use \system\event;


abstract class controller
{
	protected $view;
	public $output;	


	abstract function init($params=null);
	
	abstract function run();
	

	public function push()
	{
		$this->output = (string)$this->view;
		event::outputBefore($this);
		echo $this->output;
	}
}
