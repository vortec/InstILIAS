<?php
namespace InstILIAS\interfaces;

/**
* intefgace for installing an ilias
*
* @author Stefan Hecken <stefan.hecken@concepts-and-training.de>
*/

interface Installator{
	/*
	* check out ilias from source and switch to used branch
	*/
	public function checkoutIlias();

	/**
	* copy and write the client ini
	*/
	public function writeClientIni();

	/**
	* copy and write the ilias ini
	*/
	public function writeIliasIni();

	/**
	* install database
	*/
	public function installDatabase();

	/**
	* install languages
	*/
	public function installLanguages();
}