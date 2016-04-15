<?php
namespace CaT\InstILIAS;
use Symfony\Component\Yaml\Yaml;

class YamlParser implements \CaT\InstILIAS\interfaces\Parser {
	public function read_config($string, $class) {
		if(!class_exists($class, true)){
			throw new \LogicException("Class '$class' does not exists");
		}

		$yaml = Yaml::parse($string);
		return $this->createConfig($yaml, $class);
	}

	protected function createConfig($yaml, $class) {
		foreach ($class::fields() as $key => $type) {

			if(is_subclass_of($type, "\\CaT\\InstILIAS\\Config\\Base")) {
				$vals[] = $this->createConfig($yaml[$key], $type);
			}
			else if ($type == "string") {
				$vals[] = $yaml[$key];
			}
			else if ($type == "int") {
				$vals[] = $yaml[$key];
			}
			else if(is_array($type)) {
				assert('count($type) === 1');
				$content = $type[0];
				
				if(is_subclass_of($content, "\\CaT\\InstILIAS\\Config\\Base")) {
					$sub_vals = array();
					foreach ($yaml[$key] as $key => $value) {
						$sub_vals[] = $this->createConfig($value, $content);
					}
					$vals[] = $sub_vals;
				} else {
					$vals[] = $yaml[$key];
				}
			}
			else {
				throw new \LogicException("Unknown Type: ".$type);
			}
		}

		$class_handle = new \ReflectionClass($class);
		return $class_handle->newInstanceArgs($vals);
	}
}