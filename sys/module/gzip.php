<?php
namespace sys\module;

final class gzip extends \sys\super\module
{
	public function check()
	{
		if( ! extension_loaded('zlib') ){
			return false;
		}
		if( isset($_SERVER['HTTP_ACCEPT_ENCODING']) && 
			strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')!==false ){
			return true;
		}
		return false;
	}
	
	public function run(&$output)
	{
		if( ! $this->check() || headers_sent() )
			return ;

		$output = gzencode($output, 9);
		header('Content-Encoding: gzip');
	}
}
