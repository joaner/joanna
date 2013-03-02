<?php
namespace app\model;

final class getEventsList extends \sys\super\model
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