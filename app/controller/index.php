<?php
namespace app\controller;

final class index extends \sys\super\controller
{
	
	public function init($params=null)
	{
		parent::init();
		$this->view = new \app\view\metro;
	}
	
	public function run()
	{
		$test = new \app\model\getEventsList;
		
		$max = $test->getMax();

		$this->view->title('index - '. $max);
		$this->view->resource();
		$this->view->header();
		$this->view->article();
		$this->view->footer();
	}
	
	
}