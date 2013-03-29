<?php
namespace application\model;

use \system\super\model;
use \system\database;

final class test extends model
{
	/*
	 * 
	 * @cache no-cache
	 * @expire 20000
	 */
	protected function run()
	{
		$db = database::getInstance();
		$sql = "create table 'hello'";
		$db->query($sql);
	}
	
	
}
