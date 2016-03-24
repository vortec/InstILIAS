<?php
namespace InstILIAS\Config;

/**
 * TODO: This name seems odd. It's about the master password, right?
 */
class Setup extends Base {
	/**
	 * @var	string
	 */
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
