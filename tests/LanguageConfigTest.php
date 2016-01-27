<?php
require_once("classes/LanguageConfig.php");

class LanguageConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->client_ini_language_config = new LanguageConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("LanguageConfig", $this->client_ini_db_config);
	}

	/**
	* @dataProvider setDefaultLangProvider
	*/
	public function test_setDefaultLang($default_lang) {
		$this->client_ini_language_config->setDefaultLang($default_lang);

		$this->assertEquals($this->client_ini_language_config->defaultLang(), $default_lang);
		$this->assertInternalType("string", $this->client_ini_language_config->defaultLang());
	}

	/**
	* @dataProvider setToInstallLangsProvider
	*/
	public function test_setToInstallLangs($to_install_langs) {
		$this->client_ini_language_config->setToInstallLangs($to_install_langs);

		$this->assertEquals($this->client_ini_language_config->toInstallLangs(), $to_install_langs);
		$this->assertInternalType("array", $this->client_ini_language_config->toInstallLangs());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($default_lang, $to_install_langs) {
		$this->client_ini_language_config->setDefaultLang($default_lang);
		$this->client_ini_language_config->setToInstallLangs($to_install_langs);

		$all_properties = $this->client_ini_db_config->getPropertiesOf();

		$this->assertEquals($all_properties["default_lang"], $default_lang);
		$this->assertInternalType("string", $all_properties["default_lang"]);

		$this->assertEquals($all_properties["to_install_langs"], $to_install_langs);
		$this->assertInternalType("array", $all_properties["to_install_langs"]);
	}

	public function setHostProvider() {
		return array(array("de")
					, array("en")
					, array("es")
					, array("da")
					, array("ar")
					, array("el")
				);
	}

	public function setDatabaseProvider() {
		return array(array(array("de","en"))
					, array(array("en","ar"))
					, array(array("es","sq"))
					, array(array("da","pl"))
					, array(array("ar","nl"))
					, array(array("el","sk"))
				);
	}

	public function getAllPropertiesProvider() {
		return array(array("de",array("de","en"))
					, array("en",array("en","ar"))
					, array("es",array("es","sq"))
					, array("da",array("da","pl"))
					, array("ar",array("ar","nl"))
					, array("el",array("el","sk"))
				);
	}
}