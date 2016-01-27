<?php
require_once("mocks/MockParser.php");

class MockParserTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new MockParser();
	}

	
}