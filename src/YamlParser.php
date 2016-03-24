<?php
namespace InstILIAS;
use Symfony\Component\Yaml\Yaml;

class YamlParser implements \InstILIAS\interfaces\Parser {
	public function read_config($string, $class) {
		if(!class_exists($class, true)){
			throw new \LogicException("Class '$class' does not exists");
		}

		$yaml = Yaml::parse($string);
		$name = $class::NAME;

		$config = new $class();

		$all_properties = $config->getPropertiesOf();

		foreach($all_properties as $key => $value) {
			$all_properties[$key] = $yaml[$name][$key];
		}

		$config->setValues($all_properties);

		return $config;
	}
}