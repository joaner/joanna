<?php
namespace system\module;

use \system\super\module;
use \system\super\event;
use \system\cache;


final class magicCache implements module
{
	public function __minit()
	{
		return true;
	}

	public function __rinit()
	{
		return true;
	}

	public function modelExecBefore(event $model)
	{
		$key = $this->getCacheKey($model);
		if( $data = cache::get($key) ){
			header("X-Cache: {$key}");
			$model->setMethod(MAGIC_SKIP);
			$model->setResult($data);
		}
	}

	public function modelExecAfter(event $model)
	{
		if( $model->getMethod() !== MAGIC_SKIP ){
			$key = $this->getCacheKey($model);
			cache::set($key, $model->getResult());
		}
	}

	private function getCacheKey(event $model)
	{
		return get_class($model).'::'.$model->getMethod();
	}

}