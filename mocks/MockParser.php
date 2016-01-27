<?php
require_once("interfaces/Parser.php");

class MockParser implements Parser {

	public function read_config($string, $class) {
		
		if(!file_exists("classes/".$class.".php")) {
			throw new LogicException("MockParser::read_config: File not Found ".$class);
		}

		require_once("classes/".$class.".php");

		return new $class();
	}
}