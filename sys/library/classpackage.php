<?php
namespace sys\library;

final class classpackage
{
	public function file($class)
	{
		return DIR. '/'. str_replace('\\', '/', $class) .'.php';
	}
}