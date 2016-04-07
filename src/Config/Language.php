<?php
namespace InstILIAS\Config;

/**
 * Config for the languages to be used in ILIAS.
 */
class Language extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "default_lang"			=> "string"
			, "to_install_langs"		=> array("string")
			);
	}

	static $valid_languages = array(
		"de"
		,"en");

	/**
	 * @inheritdocs
	 */
	protected function checkValueContent($key, $value) {
		switch($key) {
			case "to_install_langs":
			case "default_lang":
				return $this->checkContentValueInArray($value, self::$valid_languages);
				break;
			default:
				return parent::checkValueContent($key, $value);
		}
	}
}
