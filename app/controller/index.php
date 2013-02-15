<?php
namespace app\controller;

final class index extends \system\super\controller
{
	
	public function init($params=null)
	{
		parent::init();
		$this->view = new \app\view\events;
	}
	
	public function run()
	{
		$this->view->title('index');

		$this->view->header();
		$this->view->article();
		$this->view->footer();
	}
	
	
}