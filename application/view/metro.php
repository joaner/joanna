<?php
namespace application\view;

use \system\super\view;

final class metro extends view
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
				// array('mimetype'=>'application/x-javascript', 'src'=>'layout.js'),
				array('mimetype'=>'text/css', 'src'=>'layout.css'),
				array('mimetype'=>'text/css', 'src'=>'color.css'),
		);
	}
	
	public function header()
	{
		$this->header = array(
			'menu' => array(
				'art' => 'Arts & Culture',
				'music' => 'Music & Film',
				'community' => 'Family',
				'nightlife' => 'Dining & Nightlife',
				'travel' => 'Travel',
				'other' => 'More'
			),	
		);
	}
	
	public function article()
	{
		// $this->article = 'This script run as fast-cgi';
	}
	public function footer()
	{
		// $this->footer = 'use '. round(microtime(true)-START_TIME, 6);
	}
	
}
