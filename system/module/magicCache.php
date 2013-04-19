<?php
namespace system\module;

use \system\super\module;
use \system\super\event;
use \system\cache;


final class magicCache implements module
{

	public function modelExecBefore(event $model)
	{
		$key = $this->getCacheKey($model);
		if( $data = cache::get($key) ){
			$model->setMethod('_skip_');
			$model->setResult($data);
		}
	}

	public function modelExecAfter(event $model)
	{
		if( $model->getMethod !== '_skip_' ){
			$key = $this->getCacheKey($model);
			cache::set($key, $model->getResult());
		}
	}

	private function getCacheKey(event $model)
	{
		return get_class($model).'::'.$model->getMethod();
	}

}