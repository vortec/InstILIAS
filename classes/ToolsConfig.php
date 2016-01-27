<?php
/**
*
*
*/
require_once("abstracts/BaseConfig.php");

class ToolsConfig extends BaseConfig {
	protected $convert;
	protected $zip;
	protected $unzip;
	protected $java;

	protected $config_group = "tools";

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

	/**
	* gets the config_group
	*
	* @return string
	*/
	public function configGroup() {
		return $this->config_group;
	}
}