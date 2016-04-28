<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for one client of ILIAS.
 *
 * @method string dataDir()
 * @method string name()
 * @method string passwordEncoder()
 */
class LDAP extends Base {
	const SERVER_REGEX = "/^(ldap://)/";

	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "name"	=> array("string", false)
			, "server"	=> array("string", false)
			, "basedn"	=> array("string", false)
			, "con_type"	=> array("integer", false)
			, "con_user_dn"	=> array("string", false)
			, "con_user_pw"	=> array("string", false)
			, "synch_type"	=> array("string", false)
			, "user_group"	=> array("string", true)
			, "attr_name_user"	=> array("string", false)
			);
	}

	protected static $con_types = array
			( 0
			, 1
			);

	protected static $synch_types = array
			( 'synch_per_cron'
			, 'synch_on_login'
			);

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "con_type":
				return $this->checkContentValueInArray($value, self::$con_types);
			case "synch_type":
				return $this->checkContentValueInArray($value, self::$synch_types);
			case "server":
				return $this->checkContentPregmatch($value, self::SERVER_REGEX);
			default:
				return parent::checkValueContent($key, $value);
		}
	}
}
