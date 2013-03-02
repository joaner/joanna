<?php
namespace sys\super;

interface router
{
	// @return string : controller name
	public function action();
	// @return array : request param
	public function params();
	// @return string : controller name
	public function rewrite($action);	
}
