<?php
namespace system\module;

use \system\super\module;
use \system\super\controller;

final class debug implements module
{
	public function init($event)
	{
		return !headers_sent();
	}

	public function run($controller)
	{
		header('X-Runtime: '. round((microtime(true)-START_TIME)*1000, 1) );
		header('X-Included-Files: '. count(get_included_files()) );
		
		$included = get_included_files();
		foreach($included as &$file){
			$file = str_replace(DIR, '', $file);
		}
		$controller->output = str_replace('</body>', implode(PHP_EOL, $included)."\n</body>", $controller->output);
	}
}
