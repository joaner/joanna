<?php
namespace application\view;

use \system\super\view;

final class events extends view
{
	public function title($title)
	{
		$this->title = $title;
		if( $this->title!=='' ){
			$this->title = htmlentities($this->title.' | ');
		}
		$this->title .= 'Events';
	}
	
	public function resource()
	{
		$this->resource = array(
			array('mimetype'=>'application/x-javascript', 'src'=>'core.js'),
			array('mimetype'=>'text/css', 'src'=>'core.css'),	
		);
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
