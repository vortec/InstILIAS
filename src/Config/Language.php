<?php
namespace InstILIAS\Config;

/**
 * Config for the languages to be used in ILIAS.
 */
class Language extends Base {
	/**
	 * TODO: This should be constrained to the lang identifiers that could
	 * actually be used in ILIAS.
	 * @var	string
	 */
	protected $default_lang;

	/**
	 * TODO: See $default_lang
	 * @var	string[]
	 */
	protected $to_install_langs;

	const NAME = "lang";

	/**
	* sets the default language
	*
	* @param string
	*/
	public function setDefaultLang($default_lang) {
		assert(is_string($default_lang));

		$this->default_lang = $default_lang;
	}

	/**
	* gets the default language
	*
	* @return string
	*/
	public function defaultLang() {
		return $this->default_lang;
	}

	/**
	* sets the language shoud be installed
	*
	* @param array
	*/
	public function setToInstallLangs(array $to_install_langs) {
		assert(is_array($to_install_langs));

		$this->to_install_langs = $to_install_langs;
	}

	/**
	* gets the language shoud be installed
	*
	* @return string
	*/
	public function toInstallLangs() {
		return $this->to_install_langs;
	}
}
