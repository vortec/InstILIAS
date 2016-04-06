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
}
