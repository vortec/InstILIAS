<?php
namespace InstILIAS\Config;

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
		"innodb");

	static $valid_encodings = array(
		"utf8_general_ci");

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "engine":
				return $this->checkContentValueInArray($value, self::$valid_engines);
				break;
			case "encoding":
				return $this->checkContentValueInArray($value, self::$valid_encodings);
				break;
			default:
				return parent::checkValueContent($key, $value);
		}
	}
}