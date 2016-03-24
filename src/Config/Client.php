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

	protected function checkValueContent($key, $value) {
		if ($key == "password_encoder") {
			return in_array($value, self::$valid_password_encoders);
		}

		return parent::checkValueContent($key, $value);
	}
}
