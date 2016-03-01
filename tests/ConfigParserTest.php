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
		$json_string = '{"setup": {"passwd" : "sdasdads"},"lang": {"default_lang":"de","to_install_langs":["en","de"]}}';

		return array(array($json_string, "\InstILIAS\configs\ClientConfig")
					, array($json_string, "\InstILIAS\configs\DbConfig")
					, array($json_string, "\InstILIAS\configs\GitHubConfig")
					, array($json_string, "\InstILIAS\configs\LanguageConfig")
					, array($json_string, "\InstILIAS\configs\ServerConfig")
					, array($json_string, "\InstILIAS\configs\SetupConfig")
					, array($json_string, "\InstILIAS\configs\ToolsConfig")
				);
	}

}