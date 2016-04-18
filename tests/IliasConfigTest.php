<?php

use \CaT\InstILIAS\Config\Ilias;
use \CaT\InstILIAS\YamlParser;

class IliasConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new YamlParser();
		$this->yaml_string = "--- 
main_repo: 
    git_url: https://github.com/conceptsandtraining/ILIAS.git
    git_branch_name: ilias
logs:
    - md5
    - md2
    - md3
text: pusteblume
plugins:
    plugin1:
        git_url: https://github.com/conceptsandtraining/ILIAS.git
        git_branch_name: ilias
    plugin2:
        git_url: https://github.com/conceptsandtraining/ILIAS.git
        git_branch_name: ilias
    plugin3:
        git_url: https://github.com/conceptsandtraining/ILIAS.git
        git_branch_name: ilias";
	}

	public function test_not_enough_params() {
		try {
			$config = new Ilias();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function test_createIliasConfig() {
		$config = $this->parser->read_config($this->yaml_string, "\\CaT\\InstILIAS\\Config\\Ilias");

		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Ilias", $config);
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\GitBranch", $config->mainRepo());

		$this->assertInternalType("array", $config->plugins());
		foreach ($config->plugins() as $key => $value) {
			$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\GitBranch", $value);
		}

		$this->assertEquals($config->mainRepo()->gitUrl(), "https://github.com/conceptsandtraining/ILIAS.git");
		$this->assertEquals($config->mainRepo()->gitBranchName(), "ilias");

		$this->assertEquals($config->text(), "pusteblume");
		$this->assertInternalType("array", $config->logs());
	}
}