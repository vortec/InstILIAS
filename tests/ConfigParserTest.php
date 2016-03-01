<?php
require_once("tests/mocks/MockParserTest.php");
class ConfigParserTest extends MockParserTest {
	public function setUp() {
		$this->parser = new \InstILIAS\ConfigParser();
	}

	/**
	* @dataProvider readConfigWithValuesProvider
	*/
	public function test_readConfigWithValues($string, $class) {
		$obj = $this->parser->read_config($string, $class);

		$this->assertInstanceOf($class, $obj);
	}

	public function readConfigWithValuesProvider() {
		return array(array('{"setup": {"passwd" : "sdasdads"},"lang": {"default_lang":"de","to_install_langs":["en","de"]}}', "\InstILIAS\configs\SetupConfig")
					, array('{"setup": {"passwd" : "sdasdads"},"lang": {"default_lang":"de","to_install_langs":["en","de"]}}', "\InstILIAS\configs\LanguageConfig")
					/*, array("asas", "\InstILIAS\configs\GitHubConfig")
					, array("asas", "\InstILIAS\configs\LanguageConfig")
					, array("asas", "\InstILIAS\configs\ServerConfig")
					, array("asas", "\InstILIAS\configs\SetupConfig")
					, array("asas", "\InstILIAS\configs\ToolsConfig")*/
				);
	}

}