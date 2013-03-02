<?php
namespace sys\super;

abstract class view
{
	protected $data = array();
	protected $layout;
		
	public function &__get($name)
	{
		if( array_key_exists($name, $this->data) ){
			if( is_array($this->data[$name]) && is_callable($this->data[$name]) ){
				$this->data[$name] = call_user_func($this->data[$name]);
			}
			return $this->data[$name];
		}else{
			echo ('View: '. $name .' Not found');
		}
	}
	
	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	public function __toString()
	{
		ob_start();
		require DIR.'/'.str_replace('\\', '/', get_class($this)).'/layout.php';
		$str = ob_get_contents();
		ob_end_clean();
		return $str;
	}
	
	
	/**
	abstract function title();
	abstract function link();
	abstract function header();
	abstract function article();
	abstract function footer();
	*/
}
