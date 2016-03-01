<?php
class DbConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->client_ini_db_config = new \InstILIAS\classes\DbConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\classes\DbConfig", $this->client_ini_db_config);
	}

	/**
	* @dataProvider setHostProvider
	*/
	public function test_setHost($host) {
		$this->client_ini_db_config->setHost($host);

		$this->assertEquals($this->client_ini_db_config->host(), $host);
		$this->assertInternalType("string", $this->client_ini_db_config->host());
	}

	/**
	* @dataProvider setDatabaseProvider
	*/
	public function test_setDatabase($database) {
		$this->client_ini_db_config->setDatabase($database);

		$this->assertEquals($this->client_ini_db_config->database(), $database);
		$this->assertInternalType("string", $this->client_ini_db_config->database());
	}

	/**
	* @dataProvider setUserProvider
	*/
	public function test_setUser($user) {
		$this->client_ini_db_config->setUser($user);

		$this->assertEquals($this->client_ini_db_config->user(), $user);
		$this->assertInternalType("string", $this->client_ini_db_config->user());
	}

	/**
	* @dataProvider setPasswdProvider
	*/
	public function test_setPasswd($passwd) {
		$this->client_ini_db_config->setPasswd($passwd);

		$this->assertEquals($this->client_ini_db_config->passwd(), $passwd);
		$this->assertInternalType("string", $this->client_ini_db_config->passwd());
	}

	/**
	* @dataProvider setEncodingProvider
	*/
	public function test_setEncoding($encoding) {
		$this->client_ini_db_config->setEncoding($encoding);

		$this->assertEquals($this->client_ini_db_config->encoding(), $encoding);
		$this->assertInternalType("string", $this->client_ini_db_config->encoding());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($host, $database, $user, $passwd, $encoding) {
		$this->client_ini_db_config->setHost($host);
		$this->client_ini_db_config->setDatabase($database);
		$this->client_ini_db_config->setUser($user);
		$this->client_ini_db_config->setPasswd($passwd);
		$this->client_ini_db_config->setEncoding($encoding);

		$all_properties = $this->client_ini_db_config->getPropertiesOf();

		$this->assertEquals($all_properties["host"], $host);
		$this->assertInternalType("string", $all_properties["host"]);

		$this->assertEquals($all_properties["database"], $database);
		$this->assertInternalType("string",$all_properties["database"]);

		$this->assertEquals($all_properties["user"], $user);
		$this->assertInternalType("string", $all_properties["user"]);

		$this->assertEquals($all_properties["passwd"], $passwd);
		$this->assertInternalType("string", $all_properties["passwd"]);

		$this->assertEquals($all_properties["encoding"], $encoding);
		$this->assertInternalType("string", $all_properties["encoding"]);
	}

	public function setHostProvider() {
		return array(array("localhost")
					, array("127.0.0.1")
					, array("orange")
					, array("lia")
					, array("bunt")
					, array("servname")
				);
	}

	public function setDatabaseProvider() {
		return array(array("ilias")
					, array("test")
					, array("ilias51")
					, array("ilias_neu")
					, array("ilias_trunk")
					, array("il")
				);
	}

	public function setUserProvider() {
		return array(array("ilias")
					, array("root")
					, array("db_user")
					, array("admin_db")
					, array("admin_full")
					, array("admin_yeah")
				);
	}

	public function setPasswdProvider() {
		return array(array("#Ea5489jZ")
					, array("2+bLV3926")
					, array("c3<62U#LE")
					, array("Vk3z}!4mS")
					, array("pc<DVh3+m")
					, array("YCw/W9Whm")
				);
	}

	public function setEncodingProvider() {
		return array(array("utf-8")
					, array("utf-8_wob")
					, array("iso")
					, array("utf8-irgendwas")
					, array("swedish-latin")
					, array("mein_eigenes")
				);
	}

	public function getAllPropertiesProvider() {
		return array(array("localhost","ilias","ilias","#Ea5489jZ","utf-8")
					, array("127.0.0.1","test","root","2+bLV3926","utf-8_wob")
					, array("orange","ilias51","db_user","c3<62U#LE","iso")
					, array("lia","ilias_neu","admin_db","Vk3z}!4mS","utf8-irgendwas")
					, array("bunt","ilias_trunk","admin_full","pc<DVh3+m","swedish-latin")
					, array("servname","il","admin_yeah","YCw/W9Whm","mein_eigenes")
				);
	}
}