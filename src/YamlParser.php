<?php
namespace InstILIAS;

class ConfigParser implements \InstILIAS\interfaces\Parser {
	public function read_config($string, $class) {
		if(!class_exists($class, true)){
			throw new \LogicException("Class does not exists");
		}

		$json = json_decode($string);
		$name = $class::NAME;

		$config = new $class();

		$all_properties = $config->getPropertiesOf();

		foreach($all_properties as $key => $value) {
			$all_properties[$key] = $json->$name->$key;
		}

		$config->setValues($all_properties);

		return $config;
	}
}