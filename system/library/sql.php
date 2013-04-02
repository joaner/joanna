<?php
namespace sys\library;

use system\super\library;

final class sql implements library 
{
	public static $prefix = '';

	public $link = '';
	
	public function __call($name, $value)
	{
		$value = array_shift($value);
		$this->{$name} = call_user_func(array($this, $name), $value);
	}

	protected function select($field='*')
	{
		return is_array($field) ? '`'. implode('`, `', $field) .'`' : $field;
	}
	
	protected function from($table)
	{
		return '`'.self::$prefix.$table.'`';
	}
	
	protected function where($filed, $value, $do='=')
	{
		$where = $this->link;
		switch($do){
			case '=':
			case '<':
			case '>':
			case '>=':
			case '<=':
				$where .= "{$filed} {$do} '{$value}'";
			break;
			case 'LIKE':
				$where .= "{$filed} LIKE '%{$value}%'";
			break;
			case 'IS':
			
		}
		
		$this->link || ($this->link='AND');
	}
	
}

