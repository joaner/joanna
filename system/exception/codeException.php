<?php
namespace system\exception;

final class codeException extends \Exception
{
	public function __toString()
	{
		return print_r($this->getTrace(), true);
	}	
}
