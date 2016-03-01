<?php
namespace InstILIAS\configs;

/**
*
*
*/

class SetupConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $passwd;
	const NAME = "setup";

	/**
	* sets the passwd
	*
	* @param string
	*/
	public function setPasswd($passwd) {
		assert(is_string($passwd));

		$this->passwd = $passwd;
	}

	/**
	* gets the passwd
	*
	* @return string
	*/
	public function passwd() {
		return $this->passwd;
	}
}