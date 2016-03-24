<?php
namespace InstILIAS\Config;

/**
 * Configuration for the tools required by ILIAS.
 */
class Tools extends Base {
	/**
	 * @var	string
	 */
	protected $convert;

	/**
	 * @var	string
	 */
	protected $zip;

	/**
	 * @var	string
	 */
	protected $unzip;

	/**
	 * @var	string
	 */
	protected $java;

	const NAME = "tools";

	/**
	* sets the convert
	*
	* @param string
	*/
	public function setConvert($convert) {
		assert(is_string($convert));

		$this->convert = $convert;
	}

	/**
	* gets the convert
	*
	* @return string
	*/
	public function convert() {
		return $this->convert;
	}

	/**
	* sets the zip
	*
	* @param string
	*/
	public function setZip($zip) {
		assert(is_string($zip));

		$this->zip = $zip;
	}

	/**
	* gets the zip
	*
	* @return string
	*/
	public function zip() {
		return $this->zip;
	}

	/**
	* sets the unzip
	*
	* @param string
	*/
	public function setUnzip($unzip) {
		assert(is_string($unzip));

		$this->unzip = $unzip;
	}

	/**
	* gets the unzip
	*
	* @return string
	*/
	public function unzip() {
		return $this->unzip;
	}

	/**
	* sets the java
	*
	* @param string
	*/
	public function setJava($java) {
		assert(is_string($java));

		$this->java = $java;
	}

	/**
	* gets the java
	*
	* @return string
	*/
	public function java() {
		return $this->java;
	}
}
