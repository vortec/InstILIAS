<?php
/**
*
*
*/

class iniValue{
	protected $name;
	protected $value;

	public function __construct($name, $value) {
		$this->name = $name;
		$this->value = $value;
	}

	/**
	* gets the name of the value
	*
	* @return string
	*/
	public function name() {
		return $this->name;
	}

	/**
	* gets the value
	*
	* @return mixed
	*/
	public function value() {
		return $this->value;
	}
}