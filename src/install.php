<?php
//set error_reporting auf ein böses level
error_reporting(E_ALL & ~E_STRICT);

//import autoloader für InstILIAS
require __DIR__ . '/../vendor/autoload.php';

//define parser
$parser = new \CaT\InstILIAS\YamlParser();

//read yaml file
$json_string = file_get_contents(__DIR__."/config.yaml");

//$general_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\General")

//read different configs
$client_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\Client");
$db_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\DB");
$language_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\Language");
$server_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\Server");
$setup_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\Setup");
$tools_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\Tools");
$log_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\Log");
$ilias_git_config = $parser->read_config($json_string, "\\CaT\\InstILIAS\\Config\\GitBranch");

//define path vars for global use
$http_path = $server_config->httpPath();
$absolute_path = $server_config->absolutePath();
$data_path = $client_config->dataDir();
$client_id = $client_config->name();
$web_dir = "data";

//define git executer
$git = new \CaT\InstILIAS\GitExecuter;
//clone git
try {
	echo "Clone repository from: ".$ilias_git_config->gitUrl();
	echo " (This could take a few minutes)";
	$git->cloneGitTo($ilias_git_config->gitUrl(), $absolute_path);
	echo "\t\tDone...\n";
} catch(\RuntimeException $e) {
	echo $e->getMessage();
	die(1);
} catch(\LogicException $e) {
	echo $e->getMessage();
	die(1);
}

//switch to branch
try {
	echo "Checkout branch: ".$ilias_git_config->gitUrl();
	$git->checkoutBranch($ilias_git_config->gitBranchName(), $absolute_path);
	echo "\t\tDone...\n";
} catch(\RuntimeException $e) {
	echo $e->getMessage();
	die(1);
} catch(\LogicException $e) {
	echo $e->getMessage();
	die(1);
} catch(\InvalidArgumentException $e) {
	echo $e->getMessage();
	die(1);
}

//change dir to ILIAS Folder
chdir($absolute_path);
if(file_exists($absolute_path.'/libs/composer/vendor/autoload.php')) {
	include_once $absolute_path.'/libs/composer/vendor/autoload.php';
}

require_once("my_setup_header.php");

//define setup object
$setup = new \ilSetup(true,"admin");

//define installator
echo "Initialize installer";
$iinst = new \CaT\InstILIAS\IliasReleaseInstallator($path, $setup);
echo "\t\tDone...\n";

//set configs to installator
echo "Start install ILIAS\n\n";
$iinst->setConfigFiles($client_config, $db_config, $language_config, $log_config, $server_config, $setup_config, $tools_config);

//create ilias.ini.php
echo "Create ILIAS ini";
$iinst->writeIliasIni();
echo "\t\tDone...\n";

//create client.ini.php + folder structure
echo "Create Client ini";
$iinst->writeClientIni();
echo "\t\tDone...\n";

$iinst->connectDatabase();

//install ILIAS Database
echo "Create Database";
$iinst->installDatabase();
//conncet to Database
$db = $iinst->getDatabaseHandle();
$db_updater = new \ilDBUpdate($db);
$iinst->applyHotfixes($db_updater);
$iinst->applyUpdates($db_updater);
echo "\t\tDone...\n";

//install languages
echo "Install Languages";
$lng->setDbHandler($ilDB);
$iinst->installLanguages($lng);
echo "\t\tDone...\n";

//set proxy use
$iinst->setProxy();

//set register for nic
$iinst->registerNoNic();

//save encoding for passwort
$encoder_factory = new \ilUserPasswordEncoderFactory(array());
$iinst->setPasswordEncoder($encoder_factory);

//finish ILIAS setup
if(!$iinst->finishSetup()) {
    echo "Something went wrong at finish setup";
    die(1);
}

echo "\n\nIlias successfull installed.";
die(0);