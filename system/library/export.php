<?php
namespace system\library;

use \system\super\library;

final class export implements library
{
	public static function script(&$content, array $note=null)
	{
		$file = '<?php'.PHP_EOL;
		if( ! is_null($note) ){
			foreach($note as $name=>&$value){
				$file .= "\${$name} = ". self::export($value) .';'. PHP_EOL;
			}
		}
		$file .= 'return '. self::export($content) .';'. PHP_EOL;

		return $file;
	}

	public static function rfc2397($file)
	{
		$mime = mime_content_type($file);
		$content = file_get_contents($file);
		// $base64 = base64_encode($content);

		return "data:{$mime};charset=utf-8,{$content}";
	}

	private static function export(&$content)
	{
		return var_export($content, true);
	}
}

