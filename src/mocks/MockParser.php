<?php
namespace InstILIAS\mocks;

class MockParser implements \InstILIAS\interfaces\Parser {
	public function read_config($string, $class) {
		if(!class_exists($class, true)){
			throw new \LogicException("Class does not exists");
		}

		return new $class();
	}
}