<?php
require_once("classes/class.clientIniConfig.php");
require_once("classes/clientIniSubConfigs/class.clientIniDbConfig.php");
require_once("classes/clientIniSubConfigs/class.clientIniLanguageConfig.php");

class clientIniConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->client_ini_config = new clientIniConfig();
	}

	public function test_instanceOf() {
		$this->assertIntanceOf("clientIniConfig", $client_ini_config);
	}

	/**
	* @dataProvider clientNameProvider
	*/
	public function test_setClientName($client_name) {
		$this->client_ini_config->setClientName($client_name);

		$this->assertEquals($this->client_ini_config->clientName(), $client_name);
		$this->assertInternalType("string", $this->client_ini_config->clientName());
	}

	/**
	* @dataProvider dbConfigProvider
	*/
	public function test_setDbConfig($db_config) {
		$this->client_ini_config->setDbConfig($db_config);

		$this->assertEquals($this->client_ini_config->dbConfig(), $db_config);
		$this->assertIntanceOf("clientIniDbConfig", $this->client_ini_config->dbConfig());
	}

	/**
	* @dataProvider languageConfigProvider
	*/
	public function test_setLanguageConfig($language_config) {
		$this->client_ini_config->setLanguageConfig($language_config);

		$this->assertEquals($this->client_ini_config->languageConfig(), $language_config);
		$this->assertIntanceOf("clientIniLanguageConfig", $this->client_ini_config->languageConfig());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($client_name, $db_config, $language_config) {
		$this->client_ini_config->setClientName($client_name);
		$this->client_ini_config->setDbConfig($db_config);
		$this->client_ini_config->setLanguageConfig($language_config);

		$all_properties = $this->client_ini_config->getPropertysOf();

		$this->assertEquals($all_properties["client_name"], $client_name);
		$this->assertInternalType("string", $all_properties["client_name"]);

		$this->assertEquals($all_properties["db_config"], $db_config);
		$this->assertIntanceOf("clientIniDbConfig", $all_properties["db_config"]);

		$this->assertEquals($all_properties["language_config"], $language_config);
		$this->assertIntanceOf("clientIniLanguageConfig", $all_properties["language_config"]);
	}

	public function clientNameProvider() {
		return array(array("Hallo")
					,array("Peter")
					,array("Karl")
					,array("Generali")
					,array("Pusteblume")
					,array("DEVK")
				);
	}

	public function dbConfigProvider() {
		return array(array(new clientIniDbConfig())
					,array(new clientIniDbConfig())
					,array(new clientIniDbConfig())
					,array(new clientIniDbConfig())
					,array(new clientIniDbConfig())
					,array(new clientIniDbConfig())
				);
	}

	public function languageConfigProvider() {
		return array(array(new clientIniLanguageConfig())
					,array(new clientIniLanguageConfig())
					,array(new clientIniLanguageConfig())
					,array(new clientIniLanguageConfig())
					,array(new clientIniLanguageConfig())
					,array(new clientIniLanguageConfig())
				);
	}

	public function getAllPropertiesProvider() {
		return array(array("Hallo", new clientIniDbConfig(), new clientIniLanguageConfig())
					,array("Peter", new clientIniDbConfig(), new clientIniLanguageConfig())
					,array("Karl", new clientIniDbConfig(), new clientIniLanguageConfig())
					,array("Generali", new clientIniDbConfig(), new clientIniLanguageConfig())
					,array("Pusteblume", new clientIniDbConfig(), new clientIniLanguageConfig())
					,array("DEVK", new clientIniDbConfig(), new clientIniLanguageConfig())
				);
	}
}