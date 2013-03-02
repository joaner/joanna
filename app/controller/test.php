<?php
namespace app\controller;

final class test extends \sys\super\controller
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