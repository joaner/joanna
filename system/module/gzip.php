<?php
namespace system\module;

use \system\super\module;

final class gzip implements module
{

	public function __minit()
	{
		return extension_loaded('zlib');
	}

	public function __rinit()
	{
		if( headers_sent() || 
			!isset($_SERVER['HTTP_ACCEPT_ENCODING']) ||
			strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')===false
			){
				return false;
		}
	}

	public function outputBefore($controller)
	{
		$controller->output = gzencode($controller->output, 9);
		header('Content-Encoding: gzip');
		header('Content-Length: '. strlen($controller->output));
		return true;
	}
}
