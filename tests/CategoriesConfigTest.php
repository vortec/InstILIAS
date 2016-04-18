<?php

use \CaT\InstILIAS\Config\Ilias;
use \CaT\InstILIAS\YamlParser;

class CategoriesConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new YamlParser();
		$this->yaml_string = "--- 
categories:
    0:
        title: Eins
    1:
        title: Zwei
        childs:
            10:
                title: ZweiEins
                childs: []
            11:
                title: ZweiZwei
                childs: []
    2:
        title: Drei
        childs: []";
	}

	public function test_not_enough_params() {
		try {
			$config = new Ilias();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function test_createCategoriesConfig() {
		$config = $this->parser->read_config($this->yaml_string, "\\CaT\\InstILIAS\\Config\\Categories");

		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Categories", $config);
	}
}