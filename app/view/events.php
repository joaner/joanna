<?php
namespace app\view;

final class events extends \system\super\view
{
	public function title($title)
	{
		$this->title = $title;
		if( $this->title!=='' ){
			$this->title = htmlentities($this->title.' | ');
		}
		$this->title .= 'Events';
	}
	
	public function link()
	{
		$this->link = '';
	}
	
	public function header()
	{
		$this->header = 'hi,';
	}
	
	public function article()
	{
		$this->article = 'This script run as fast-cgi';
	}	
	public function footer()
	{
		$this->footer = 'use '. round(microtime(true)-START_TIME, 6);
	}
}
