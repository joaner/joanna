<?php
namespace system\super;

interface module
{
	/**
	 * @return boolean
	 */
	public function init($event);

	/**
	 * @return boolean
	 */
	public function run(&$data);
}
