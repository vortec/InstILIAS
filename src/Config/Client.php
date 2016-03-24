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
}
