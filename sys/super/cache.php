<?php
namespace sys\super;

interface cache
{
	public function __construct(&$configure);
	public function &__get($name);
	public function __set($name, $value);
}
