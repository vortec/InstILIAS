<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for an ILIAS database.
 *
 * @method string host()
 * @method string database()
 * @method string user()
 * @method string password()
 * @method string engine()
 * @method string encoding()
 */
class DB extends Base {

	const IP_REGEX = "/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/";
	const HOST_NAME_REGEX = "/^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/";

	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "host"			=> array("string", false)
			, "database"		=> array("string", false)
			, "user"			=> array("string", false)
			, "password"		=> array("string", false)
			, "engine"			=> array("string", false)
			, "encoding"		=> array("string", false)
			);
	}

	protected static $valid_engines = array(
		"innodb"
		,"myisam");

	protected static $valid_encodings = array(
		"utf8_general_ci");

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "encoding":
				return $this->checkContentValueInArray($value, self::$valid_encodings);
			case "engine":
				return $this->checkContentValueInArray($value, self::$valid_engines);
			case "host":
				return $this->checkContentHost($value);
			default:
				return parent::checkValueContent($key, $value);
		}
	}

	protected function checkContentHost($value) {
		if(preg_match(self::IP_REGEX, strtolower($value))) {
			return true;
		}

		return (bool)preg_match(self::HOST_NAME_REGEX, strtolower($value));
	}
}