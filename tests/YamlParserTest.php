<?php
require_once("tests/mocks/MockParserTest.php");
class YamlParserTest extends MockParserTest {
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

	public function test_createClientConfig() {
		$json_string = "--- 
data_dir : sdasdads
name : hugo
password_encoder : md5";
		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\Client");

		$this->assertInstanceOf("\\InstILIAS\\Config\\Client", $obj);
		$this->assertEquals($obj->dataDir(), "sdasdads");
		$this->assertInternalType("string", $obj->dataDir());
		$this->assertEquals($obj->defaultName(), "hugo");
		$this->assertInternalType("string", $obj->defaultName());
		$this->assertEquals($obj->defaultPasswordEncoder(), "md5");
		$this->assertInternalType("string", $obj->defaultPasswordEncoder());
	}

	public function test_createDbConfig() {
		$json_string = '---
host: 127.0.0.1
database: iliastest
user: root
password: 4z0sXAPk
engine: innodb
encoding: UTF8';
		$db_config = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\DB");
		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\DB");

		$this->assertInstanceOf("\\InstILIAS\\Config\\DB", $obj);
		
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

	public function test_createGitConfig() {
		$json_string = '---
ilias_git_url: https://github.com/conceptsandtraining/ILIAS.git
ilias_git_branch_name: ilias';

		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\IliasGit");

		$this->assertInstanceOf("\\InstILIAS\\Config\\IliasGit", $obj);
		
		$this->assertEquals($obj->iliasGitUrl(), "https://github.com/conceptsandtraining/ILIAS.git");
		$this->assertInternalType("string", $obj->iliasGitUrl());

		$this->assertEquals($obj->iliasGitBranchName(), "ilias");
		$this->assertInternalType("string", $obj->iliasGitBranchName());
	}

	public function test_createLanguageConfig() {
		$json_string = '---
default_lang: de
to_install_langs:
    - en
    - de';
		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\Language");

		$this->assertInstanceOf("\\InstILIAS\\Config\\Language", $obj);
		
		$this->assertEquals($obj->defaultLang(), "de");
		$this->assertInternalType("string", $obj->defaultLang());

		$this->assertEquals($obj->toInstallLangs(), array("en","de"));
		$this->assertInternalType("array", $obj->toInstallLangs());
	}

	public function test_createServerConfig() {
		$json_string = '---
http_path: http://localhost/44generali2
absolute_path: /Library/WebServer/Documents/44generali2
timezone: Europe/Berlin';
		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\Server");

		$this->assertInstanceOf("\\InstILIAS\\Config\\Server", $obj);
		
		$this->assertEquals($obj->httpPath(), "http://localhost/44generali2");
		$this->assertInternalType("string", $obj->httpPath());

		$this->assertEquals($obj->absolutePath(), "/Library/WebServer/Documents/44generali2");
		$this->assertInternalType("string", $obj->absolutePath());

		$this->assertEquals($obj->timezone(), "Europe/Berlin");
		$this->assertInternalType("string", $obj->timezone());
	}

	public function test_createSetupConfig() {
		$json_string = '---
passwd: KarlHeinz';
		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\Setup");

		$this->assertInstanceOf("\\InstILIAS\\Config\\Setup", $obj);

		$this->assertEquals($obj->passwd(), "KarlHeinz");
		$this->assertInternalType("string", $obj->passwd());
	}

	public function test_createToolsConfig() {
		$json_string = '---
convert: /opt/ImageMagick
zip: /usr/bin/zip
unzip: /usr/bin/unzip
java: /usr/bin/java';
		$obj = $this->parser->read_config($json_string, "\\InstILIAS\\Config\\Tools");

		$this->assertInstanceOf("\\InstILIAS\\Config\\Tools", $obj);

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

		return array
			( array($json_string, "\\InstILIAS\\Config\\Client")
			, array($json_string, "\\InstILIAS\\Config\\DB")
			, array($json_string, "\\InstILIAS\\Config\\IliasGit")
			, array($json_string, "\\InstILIAS\\Config\\Language")
			, array($json_string, "\\InstILIAS\\Config\\Server")
			, array($json_string, "\\InstILIAS\\Config\\Setup")
			, array($json_string, "\\InstILIAS\\Config\\Tools")
			);
	}

}
