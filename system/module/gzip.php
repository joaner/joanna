<?php
namespace system\module;

final class gzip extends \system\super\module
{
	public function check()
	{
		if( isset($_SERVER['HTTP_ACCEPT_ENCODING']) && 
			strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')!==false ){
			return true;
		}
		return false;
	}
	
	public function run(&$output)
	{
		// $output .= var_export( strlen($output), true);
		$output .= implode(PHP_EOL, get_included_files());
		$output = gzencode($output, 9);
		header('Content-Encoding: gzip');
		// header('X-Content-Length: '. strlen($output));
	}
}