<?php
namespace application\controller;

use \system\super\controller;

use \app\model\test;

final class test extends controller
{
	public function init($params=null)
	{
		parent::init();
		// $this->view = new \app\view\metro;
	}
	
	public function run()
	{
		$this->test = new \app\model\test;
		$this->test->run();
	}
	
	public function index()
	{
		
	}
}
