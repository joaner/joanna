<?php
namespace application\model;

use \system\super\model;

final class siteConfig extends model
{
	public function getTitle()
	{
		return 'China News , Forum, sports, business, arts, tours, law News';
	}
	
	public function getKeyword()
	{
		return array('china forum', 'business', 'arts', 'tours', 'law');
	}
	
	public function getDescription()
	{
		
	}
	
}