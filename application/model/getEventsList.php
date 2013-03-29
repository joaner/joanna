<?php
namespace application\model;

use \system\super\model;

final class getEventsList extends model
{
	/**
	 * @expire 1d
	 * @return number
	 */
	protected function getMax()
	{
		sleep(1);
		return 2;
		for($i=1; $i<5; $i++){
			sleep(1);
		}
		return $i;
	}

}
