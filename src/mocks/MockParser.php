<?php
namespace InstILIAS\mocks;

class MockParser implements \InstILIAS\interfaces\Parser {
	public function read_config($string, $class) {
		return new $class();
	}
}