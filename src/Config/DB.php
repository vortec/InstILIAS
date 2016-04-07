<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for an ILIAS database.
 */
class DB extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "host"			=> "string"
			, "database"		=> "string"
			, "user"			=> "string"
			, "password"		=> "string"
			, "engine"			=> "string"
			, "encoding"		=> "string"
			);
	}

	static $valid_engines = array(
		"innodb"
		,"myisam");

	static $valid_encodings = array(
		"utf8_general_ci");

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "encoding":
				return $this->checkContentValueInArray($value, self::$valid_encodings);
				break;
			case "engine":
				return $this->checkContentValueInArray($value, self::$valid_engines);
				break;
			case "host":
				return $this->checkContentHost($value);
				break;
			default:
				return parent::checkValueContent($key, $value);
		}
	}

	protected function checkContentHost($value) {
		if(substr_count($value, " ")) {
			return false;
		}

		return true;
	}
}