<?php
namespace sys\module;

final class gzip implements \sys\super\module
{
	public static function check()
	{
		if( ! headers_sent() && extension_loaded('zlib') ){
			if( isset($_SERVER['HTTP_ACCEPT_ENCODING']) && 
				strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')!==false ){
				return true;
			}
		}
		return false;
	}
	
	public function run(&$output, $event)
	{
		$output = gzencode($output, 9);
		header('Content-Encoding: gzip');
		header('Content-Length: '. strlen($output));
	}
}
