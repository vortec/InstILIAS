<?php

use \CaT\InstILIAS\Config\General;
use \CaT\InstILIAS\YamlParser;

class GeneralConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new YamlParser();
		$this->yaml_string = "---
client:
    data_dir : /Users/shecken/Documents/ilias_data
    name : Ilias5
    password_encoder : bcrypt 
database:
    host: 127.0.0.1
    database: iliastest5
    user: root
    password: 4z0sXAPk
    engine: innodb
    encoding: utf8_general_ci 
language:
    default_lang: de
    to_install_langs:
        - en
        - de
server:
    http_path: http://localhost/iliastest5
    absolute_path: /Library/WebServer/Documents/iliastest5
    timezone: Europe/Berlin
setup:
    passwd: KarlHeinz
tools:
    convert: /opt/ImageMagick
    zip: /usr/bin/zip
    unzip: /usr/bin/unzip
    java: /usr/bin/java
log:
    path: /Users/shecken/Documents/ilias_data/Ilias5
    file_name: ilias5.log
git_branch:
    git_url: https://github.com/ILIAS-eLearning/ILIAS.git
    git_branch_name: release_5-1
category:
    categories:
        0:
            title: Eins
        1:
            title: Zwei
            childs:
                10:
                    title: ZweiEins
                    childs: []
                11:
                    title: ZweiZwei
                    childs: []
        2:
            title: Drei
            childs: []
orgunit:
    orgunits:
        0:
            title: OrgEins
        1:
            title: OrgZwei
            childs:
                10:
                    title: OrgZweiEins
                    childs: []
                11:
                    title: OrgZweiZwei
                    childs: []
        2:
            title: OrgDrei
            childs: []
role:
    roles:
        0:
            name: Admin-Ansicht
            description: Der darf alles sehen sonst nicht.
        1:
            name: DumpUsers
            description: Gruppe für alle
        2:
            name: WhosNexte
            description: Neue Menschen
ldap:
    name: ldap
    server: ldap://129.184.11.1:389
    basedn: cn=Users,dc=catdom,dc=localdomain
    con_type: 1
    con_user_dn: cn=ldap,cn=Users,dc=catdom,dc=localdomain
    con_user_pw: abcd
    synch_type: synch_on_login
    attr_name_user: sAMAccountName
    protocol_version: 3";
	}

	public function test_not_enough_params() {
		try {
			$config = new General();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function test_createIliasConfig() {
		$config = $this->parser->read_config($this->yaml_string, "\\CaT\\InstILIAS\\Config\\General");
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\General", $config);
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Client", $config->client());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\DB", $config->database());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Language", $config->language());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Server", $config->server());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Setup", $config->setup());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Tools", $config->tools());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Log", $config->log());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\GitBranch", $config->git_branch());
		$this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Categories", $config->category());
        $this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\OrgUnits", $config->orgunit());
        $this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\Roles", $config->role());
        $this->assertInstanceOf("\\CaT\\InstILIAS\\Config\\LDAP", $config->ldap());
	}
}