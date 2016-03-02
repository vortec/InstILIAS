<?php
namespace InstILIAS;

/**
*
*
*/

interface IliasInstallator{
	public function checkoutIlias();
	public function writeClientIni();
	public function writeIliasIni();
	public function installDatabase();
	public function installLanguages();
}