<?php
namespace sys\module;

final class debug extends \sys\super\module
{
	public function run(&$output)
	{
		$included = get_included_files();
		foreach($included as &$file){
			$file = str_replace(DIR, '', $file);
		}
		$output = str_replace('</body>', implode(PHP_EOL, $included)."\n</body>", $output);
	}
}
