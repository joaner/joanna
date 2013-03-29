<?php
namespace system\module;

use \system\super\module;

final class gzip implements module
{
	public function init($event)
	{
		if( ! headers_sent() && extension_loaded('zlib') ){
			if( isset($_SERVER['HTTP_ACCEPT_ENCODING']) && 
				strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')!==false ){
				return true;
			}
		}
		return false;
	}
	
	public function run(&$output)
	{
		$output = gzencode($output, 9);
		header('Content-Encoding: gzip');
		header('Content-Length: '. strlen($output));
	}
}
