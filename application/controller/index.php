<?php
namespace application\controller;

use \system\super\controller;

use \application\view\metro;
use \application\model\getEventsList;

final class index extends controller
{
	
	public function init($params=null)
	{
		parent::init();
		$this->view = new metro;
	}
	
	public function run()
	{
		$test = new getEventsList;
		
		$max = $test->getMax();

		$this->view->title('index - '. $max);
		$this->view->resource();
		$this->view->header();
		$this->view->article();
		$this->view->footer();
	}
	
	
}
