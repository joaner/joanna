<?php
namespace system\super;

interface module
{
	/**
	 * call at install time
	 * @param 	void
	 * @return 	boolean
	 */
	public function __minit();

	/**
	 * call at has request
	 * @param 	void
	 * @return 	boolean
	 */
	public function __rinit();
}
