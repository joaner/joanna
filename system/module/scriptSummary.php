<?php
namespace system\module;

use \system\cache;
use \system\library\export;

final class scriptSummary implements \system\super\module
{
	const key = 'scriptSummaryCache';
	private $scripts;
	private $update = false;

	public function init($method)
	{
		$this->method = $method;

		return class_exists('\system\cache', false);
		return true;
	}

	public function run($package)
	{
		$this->{$this->method}($package);
	}

	public function end($package)
	{
		if( is_null($this->scripts) ){
			$this->scripts = cache::get(self::key);
		}

		if( ! isset($this->scripts[$package::$class]) ){
			$this->update = true;
			$this->scripts[$package::$class] = export::rfc2397($package::$file);
		}else{
			$package::$file = $this->scripts[$package::$class];
		}
	}

	public function __destruct()
	{
		if( $this->update ){
			cache::set(self::key, $this->scripts);
		}
	}

}
