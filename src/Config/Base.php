<?php
/**
  * TODO: There is the vendor missing in the namespace, it should be
  * CaT/InstILIAS/Config (and in the other locations accordingly.)
  */
namespace InstILIAS\Config;

/**
 * Base class for all configs.
 */
abstract class Base {
	/**
	 * Get all fields that this config defines and their types.
	 *
	 * @return	array		$name	=> ConfigClass|"string"|"int"|array(ConfigClass|"string"|"int")
	 */
	abstract public static function fields();

	/**
	 * Create a config object, pass parameters according to getFields of the
	 * concrete class.
	 */
	final public function __construct() {
		$params = func_get_args();
		$this->checkParams($params);
		$this->fillProperties($params);
	}

	final public function __call($name, $params) {
		assert('count($params) === 0');
		$name = $this->from_camel_case($name);
		if (!array_key_exists($name, $this->fields())) {
			throw new \BadMethodCallException
						("Could not call unknown getter for field '$name'");
		}
		return $this->$name;
	}

	private function from_camel_case($name) {
		return preg_replace_callback("/[A-Z]/", function ($matches) {
			return "_".strtolower($matches[0]);
		}, $name);
	}

	/** TODO: Document me! */
	private function checkParams($params) {
		$fields = $this->fields();
		$amount_pars = count($params);
		if ($amount_pars !== count($fields)) {
			throw new \InvalidArgumentException
						("Only got $amount_pars parameters, expected: "
						.implode(", ", array_keys($fields))
						);
		}
	}

	/** TODO: Document me! */
	private function fillProperties($params) {
		$fields = $this->fields();
		foreach ($fields as $key => $type) {
			$this->fillProperty($key, $type, array_shift($params));
		}
	}

	/** TODO: Document me! */
	protected function fillProperty($key, $type, $value) {
		$this->checkValue($key, $type, $value);
		$this->$key = $value;
	}

	/** TODO: Document me! */
	protected function checkValue($key, $type, $value) {
		if ($type = "string") {
			$ok = is_string($value);
		}
		else if ($type = "int") {
			$ok = is_int($value);
		}
		else if (is_array($type)) {
			assert('count($type) === 1');
			$content = $type[0];
			if (!is_array($value)) {
				$ok = false;
			}
			else {
				try {
					// TODO: This is not very nice. I introduced $key to make
					// it possible for concrete config classes to perform further
					// checks on input values, but i would call checkValue with a
					// specific key with array($type) and $type as well.
					foreach ($value as $v) {
						$this->checkValue($key, $content, $v);
					}
					$ok = true;
				}
				catch (\InvalidArgumentException $e) {
					$ok = false;
				}
			}
		}
		else {
			assert(is_subclass_of("\\InstILIAS\\Config\\Base", $type));
			$ok = $value instanceof $type;
		}

		if (!$ok) {
			throw new \InvalidArgumentException
						( "Error in field $key: Expected "
						. print_r($type, true)." found ".print_r($value, true));
		}
	}
}