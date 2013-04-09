<?php
namespace application\controller;

use \system\super\controller;
use \application\model\getEventsList;

final class index extends controller
{
	protected $view = 'news';
	
	public function init($params=null)
	{
		
	}
	
	public function run()
	{
		$test = new getEventsList;
		
		$max = $test->getMax();

		$this->title = 'China News | China Forum | sports, business, arts, tours, law News';
	}
	
	
}
