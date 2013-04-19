<?php
namespace system\super;

interface event
{
	public function getMethod();
	public function getParam();
	public function getResult();

	public function setMethod($method);
	public function setParam($param);
	public function setResult($result);

	public function &_skip_(&$value);
}