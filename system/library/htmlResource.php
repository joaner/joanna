<?php
namespace system\library;

use \system\super\library;


final class htmlResource implements library
{
	private static $tag;
	
	public static function create($file)
	{
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if( $file[0] !== '/' ){
			$file = STATIC_PATH .'/'. VIEW .'/'. $file;
		}
		switch($ext){
			case 'js':
				self::createScript($file);
				break;
			case 'css':
				self::createCss($file);
				break;
			case 'woff':
				self::createWoff($file);
				break;
		}
		
		return self::$tag;
	}
	
	public static function createScript($file)
	{
		self::$tag = '<script type="text/javascript" src="'. $file .'" ></script>'. PHP_EOL;
	}
	
	public static function createCss($file)
	{
		self::$tag = '<link rel="stylesheet" href="'. $file .'" />'. PHP_EOL;
	}
	
	public static function createWoff($file)
	{
		$name = str_replace(array('-', '+'), ' ', pathinfo($file, PATHINFO_FILENAME));
		self::$tag =<<<style
<style type="text/css" >
@font-face {
  font-family: '{$name}';
  font-style: normal;
  font-weight: 400;
  src: local('{$name} Regular'), url({$file}) format('woff');
}
</style>
style;
	}
}