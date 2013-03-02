<?php
namespace sys\super;

interface module
{
	/**
	 * @return boolean
	 */
	public static function check();

	/**
	 * @return boolean
	 */
	public function run(&$data, $event);
}
