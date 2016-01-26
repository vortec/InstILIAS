<?php
require_once("mocks/mockParser.php");

class MockParserTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new mockParser();
	}

	public function test_parseConfigString() {
		$this->parser->parseConfigString("Text");

		$this->assertTrue(!empty($this->parser->getConfigData()));
		$this->assertInternalType("array", $this->parser->getConfigData());
	}
}