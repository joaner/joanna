<?php
namespace sys\module;

final class debug implements \sys\super\module
{
	public static function check()
	{
		return true;
	}

	public function run(&$output, $event)
	{
		header('X-Runtime: '. round(microtime(true)-START_TIME, 6) );
		header('X-Included-Files: '. count(get_included_files()) );
		/*
		$included = get_included_files();
		foreach($included as &$file){
			$file = str_replace(DIR, '', $file);
		}
		$output = str_replace('</body>', implode(PHP_EOL, $included)."\n</body>", $output);
		*/
	}
}
