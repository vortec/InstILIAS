<?php
require_once("tests/mocks/MockParserTest.php");
class ConfigParserTest extends MockParserTest {
	public function setUp() {
		$this->parser = new \InstILIAS\YamlParser();
	}

	/**
	* @dataProvider readConfigWithValuesProvider
	*/
	public function test_readConfigWithValues($string, $class) {
		$obj = $this->parser->read_config($string, $class);
		$this->assertInstanceOf($class, $obj);
	}

	public function test_createCientConfig() {
		$json_string = "--- 
client : 
    data_dir : sdasdads";
		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\ClientConfig");

		$this->assertInstanceOf("\InstILIAS\configs\ClientConfig", $obj);
		$this->assertEquals($obj->dataDir(), "sdasdads");
		$this->assertInternalType("string", $obj->dataDir());

		$this->assertNull($obj->defaultName());
	}

	public function test_createDbConfig() {
		$json_string = '---
db: 
    host: 127.0.0.1
    database: iliastest
    user: root
    passwd: 4z0sXAPk
    type: innodb
    encoding: UTF8';
		$db_config = $this->parser->read_config($json_string, "\InstILIAS\configs\DbConfig");
		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\DbConfig");

		$this->assertInstanceOf("\InstILIAS\configs\DbConfig", $obj);
		
		$this->assertEquals($obj->host(), "127.0.0.1");
		$this->assertInternalType("string", $obj->host());

		$this->assertEquals($obj->database(), "iliastest");
		$this->assertInternalType("string", $obj->database());

		$this->assertEquals($obj->user(), "root");
		$this->assertInternalType("string", $obj->user());

		$this->assertEquals($obj->passwd(), "4z0sXAPk");
		$this->assertInternalType("string", $obj->passwd());

		$this->assertEquals($obj->encoding(), "UTF8");
		$this->assertInternalType("string", $obj->encoding());

		$this->assertEquals($obj->type(), "innodb");
		$this->assertInternalType("string", $obj->type());
	}

	public function test_createGitHubConfig() {
		$json_string = '---
github:
    git_url: https://github.com/conceptsandtraining/ILIAS.git
    git_branch_name: ilias';

		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\GitHubConfig");

		$this->assertInstanceOf("\InstILIAS\configs\GitHubConfig", $obj);
		
		$this->assertEquals($obj->gitUrl(), "https://github.com/conceptsandtraining/ILIAS.git");
		$this->assertInternalType("string", $obj->gitUrl());

		$this->assertEquals($obj->gitBranchName(), "ilias");
		$this->assertInternalType("string", $obj->gitBranchName());
	}

	public function test_createLanguageConfig() {
		$json_string = '---
lang:
    default_lang: de
    to_install_langs:
        - en 
        - de';
		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\LanguageConfig");

		$this->assertInstanceOf("\InstILIAS\configs\LanguageConfig", $obj);
		
		$this->assertEquals($obj->defaultLang(), "de");
		$this->assertInternalType("string", $obj->defaultLang());

		$this->assertEquals($obj->toInstallLangs(), array("en","de"));
		$this->assertInternalType("array", $obj->toInstallLangs());
	}

	public function test_createServerConfig() {
		$json_string = '---
server:
    http_path: http://localhost/44generali2
    absolute_path: /Library/WebServer/Documents/44generali2
    timezone: Europe/Berlin';
		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\ServerConfig");

		$this->assertInstanceOf("\InstILIAS\configs\ServerConfig", $obj);
		
		$this->assertEquals($obj->httpPath(), "http://localhost/44generali2");
		$this->assertInternalType("string", $obj->httpPath());

		$this->assertEquals($obj->absolutePath(), "/Library/WebServer/Documents/44generali2");
		$this->assertInternalType("string", $obj->absolutePath());

		$this->assertEquals($obj->timezone(), "Europe/Berlin");
		$this->assertInternalType("string", $obj->timezone());
	}

	public function test_createSetupConfig() {
		$json_string = '---
setup:
    passwd: KarlHeinz';
		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\SetupConfig");

		$this->assertInstanceOf("\InstILIAS\configs\SetupConfig", $obj);

		$this->assertEquals($obj->passwd(), "KarlHeinz");
		$this->assertInternalType("string", $obj->passwd());
	}

	public function test_createToolsConfig() {
		$json_string = '---
tools:
    convert: /opt/ImageMagick
    zip: /usr/bin/zip
    unzip: /usr/bin/unzip
    java: /usr/bin/java';
		$obj = $this->parser->read_config($json_string, "\InstILIAS\configs\ToolsConfig");

		$this->assertInstanceOf("\InstILIAS\configs\ToolsConfig", $obj);

		$this->assertEquals($obj->convert(), "/opt/ImageMagick");
		$this->assertInternalType("string", $obj->convert());

		$this->assertEquals($obj->zip(), "/usr/bin/zip");
		$this->assertInternalType("string", $obj->zip());

		$this->assertEquals($obj->unzip(), "/usr/bin/unzip");
		$this->assertInternalType("string", $obj->unzip());

		$this->assertEquals($obj->java(), "/usr/bin/java");
		$this->assertInternalType("string", $obj->java());
	}

	public function readConfigWithValuesProvider() {
		$json_string = '---
setup:
    passwd: sdasdads
lang:
    default_lang: de
    to_install_langs:
        - en
        - de';

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