<?php
namespace application\controller;

use \system\super\controller;
use \application\model\siteConfig;

final class index extends controller
{
	protected $view = 'news';
	
	public function init($params=null)
	{
		parent::init();	
		$this->site = new siteConfig;
		$this->title = $this->site->getTitle();
		$this->keywords = $this->site->getKeyword();
		$this->description = $this->site->getDescription();
	}
	
	public function run()
	{
	}
	
	
}
