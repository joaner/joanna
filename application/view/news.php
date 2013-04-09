<?php
namespace application\view;

use \system\super\view;
use \system\super\controller;


final class news extends view
{

	public function __construct(controller $controller)
	{
		$this->controller = $controller;
	}

	public function title()
	{
		return "{$this->title} - ForeignerCN.org";
	}
	
	public function head()
	{
		
	}
	
	public function article()
	{
		
	}
	
}