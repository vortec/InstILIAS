<?php
namespace InstIlias_Mocks;

require_once("interfaces/Parser.php");

class MockParser implements Parser {

	public function read_config($string, $class) {
		return new $class();
	}
}