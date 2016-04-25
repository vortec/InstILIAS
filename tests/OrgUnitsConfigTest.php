<?php

use \CaT\InstILIAS\Config\OrgUnits;
use \CaT\InstILIAS\YamlParser;

class OrgUnitsConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new YamlParser();
		$this->yaml_string = "--- 
orgunits:
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
			$config = new OrgUnits();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function test_createOrgUnitsConfig() {
		$config = $this->parser->read_config($this->yaml_string, "\\CaT\\InstILIAS\\Config\\OrgUnits");

		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\OrgUnits", $config);
	}
}