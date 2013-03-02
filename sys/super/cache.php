<?php
namespace sys\super;

interface cache
{
	public function __construct(&$configure);
	public function get($name);
	public function set($name, $value);
}