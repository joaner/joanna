<?php
namespace application\view;

use system\super\view;

final class CLI extends view
{
	public function title($title)
	{
		$this->title = $title .' - joanna';
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
		$this->article = 'This script run as CLI';
		foreach(get_included_files() as $file){
			$this->article .= "\n$file";
		}
	}
	
	public function footer()
	{
		$this->footer = 'use '. round(microtime(true)-START_TIME, 6);
	}
}
