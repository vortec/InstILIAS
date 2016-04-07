<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for the Server ILIAS runs on.
 */
class Server extends Base {
	const URL_REG_EX = "/^^(https:\/\/|http:\/\/)/";

	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "http_path"		=> "string"
			, "absolute_path"	=> "string"
			, "timezone"		=> "string"
			);
	}

	static $valid_timezones = array(
			"Europe/Berlin"
		);

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "timezone":
				return $this->checkContentValueInArray($value, self::$valid_timezones);
				break;
			case "http_path":
				return $this->checkContentPregmatch($value, self::URL_REG_EX);
				break;
			default:
				return parent::checkValueContent($key, $value);
		}
	}
}
