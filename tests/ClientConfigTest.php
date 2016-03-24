<?php

class ClientConfigTest extends PHPUnit_Framework_TestCase{
	public function setUp() {
		$this->client_config = new \InstILIAS\Config\Client();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\\InstILIAS\\Config\\Client", $this->client_config);
	}

	/**
	* @dataProvider setDataDirProvider
	*/
	public function test_setDataDir($data_dir) {
		$this->client_config->setDataDir($data_dir);

		$this->assertEquals($this->client_config->dataDir(), $data_dir);
		$this->assertInternalType("string", $this->client_config->dataDir());
	}

	/**
	* @dataProvider setDefaultNameProvider
	*/
	public function test_setDefaultName($default_name) {
		$this->client_config->setDefaultName($default_name);

		$this->assertEquals($this->client_config->defaultName(), $default_name);
		$this->assertInternalType("string", $this->client_config->defaultName());
	}

	public function test_setDefaultPasswordEncoder() {
		$this->client_config->setDefaultPasswordEncoder("md5");

		$this->assertEquals($this->client_config->defaultPasswordEncoder(), "md5");
		$this->assertInternalType("string", $this->client_config->defaultPasswordEncoder());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($data_dir, $default_name, $default_encoder) {
		$this->client_config->setDataDir($data_dir);
		$this->client_config->setDefaultName($default_name);
		$this->client_config->setDefaultPasswordEncoder($default_encoder);

		$all_properties = $this->client_config->getPropertiesOf();

		$this->assertEquals($all_properties["data_dir"], $data_dir);
		$this->assertInternalType("string", $all_properties["data_dir"]);

		$this->assertEquals($all_properties["default_name"], $default_name);
		$this->assertInternalType("string", $all_properties["default_name"]);

		$this->assertEquals($all_properties["default_password_encoder"], $default_encoder);
		$this->assertInternalType("string", $all_properties["default_password_encoder"]);
	}

	public function setDataDirProvider() {
		return array(array("/Users/shecken/Documents/ilias_data/generali/data"));
	}

	public function setDefaultNameProvider() {
		return array(array("Generali2"));
	}

	public function getAllPropertiesProvider() {
		return array(array("/Users/shecken/Documents/ilias_data/generali/data","Generali2","md5"));
	}
}
