<?php
namespace InstILIAS\Config;

/**
 * Configuration for one client of ILIAS.
 */
class Client extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "data_dir"			=> "string"
			, "name"				=> "string"
			, "password_encoder"	=> "string"
			);
	}

	static $valid_password_encoders = array
			( "md5"
			, "bcrypt"
			);

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "password_encoder":
				return $this->checkContentInArray($value, self::$valid_password_encoders);
				break;
			default:
				return parent::checkValueContent($key, $value);
		}
	}
}
