<?php
namespace InstILIAS;

/**
*
*
*/

interface IliasConfigurator{
	public function writeClientIni();
	public function writeDBIni();
	public function writeLanguageIni();
	public function writeIliasIni();
	public function installDatabase();
	public function installLanguages();
}