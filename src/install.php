<?php
//set error_reporting auf ein böses level
error_reporting(E_ALL & ~E_STRICT);

//import autoloader für InstILIAS
require __DIR__ . '/../vendor/autoload.php';

//define parser
$parser = new \InstILIAS\YamlParser();

//read yaml file
$json_string = file_get_contents("config.yaml");

//read different configs
$client_config = $parser->read_config($json_string, "\InstILIAS\configs\ClientConfig");
$db_config = $parser->read_config($json_string, "\InstILIAS\configs\DbConfig");
$language_config = $parser->read_config($json_string, "\InstILIAS\configs\LanguageConfig");
$server_config = $parser->read_config($json_string, "\InstILIAS\configs\ServerConfig");
$setup_config = $parser->read_config($json_string, "\InstILIAS\configs\SetupConfig");
$tools_config = $parser->read_config($json_string, "\InstILIAS\configs\ToolsConfig");
$log_config = $parser->read_config($json_string, "\InstILIAS\configs\LogConfig");
$ilias_git_config = $parser->read_config($json_string, "\InstILIAS\configs\IliasGitConfig");

//define path vars for global use
$http_path = $server_config->httpPath();
$absolute_path = $server_config->absolutePath();
$data_path = $client_config->dataDir();
$client_id = $client_config->defaultName();
$web_dir = "data";

//define git executer
$git = new CaT\InstILIAS\GitExecuter;
//clone git
try {
	$git->cloneGitTo($ilias_git_config->iliasGitUrl(), $absolute_path);
} catch(RuntimeException $e) {
	echo $e->getMessage();
	die(1);
} catch(LogicException $e) {
	echo $e->getMessage();
	die(1);
}

//switch to branch
try {
	$git->checkoutBranch($ilias_git_config->iliasGitBranchName(), $absolute_path);
} catch(RuntimeException $e) {
	echo $e->getMessage();
	die(1);
} catch(LogicException $e) {
	echo $e->getMessage();
	die(1);
} catch(InvalidArgumentException $e) {
	echo $e->getMessage();
	die(1);
}

//change dir to ILIAS Folder
chdir($absolute_path);
require_once $absolute_path.'/libs/composer/vendor/autoload.php';
require_once("my_setup_header.php");

//define setup object
$setup = new \ilSetup(true,"admin");

//define installator
$iinst = new CaT\InstILIAS\IliasReleaseInstallator($path, $setup, $func);

//set configs to installator
$iinst->setConfigFiles($client_config, $db_config, $language_config, $log_config, $server_config, $setup_config, $tools_config);

//create ilias.ini.php
$iinst->writeIliasIni();

//create client.ini.php + folder structure
$iinst->writeClientIni();

$iinst->connectDatabase();

//install ILIAS Database
$iinst->installDatabase();
//conncet to Database
$db = $iinst->getDatabaseHandle();
$db_updater = new \ilDBUpdate($db);
$iinst->applyHotfixes($db_updater);
$iinst->applyUpdates($db_updater);

//install languages
$lng->setDbHandler($ilDB);
$iinst->installLanguages($lng);

//set proxy use
$iinst->setProxy();

//set register for nic
$iinst->registerNoNic();

//save encoding for passwort
$encoder_factory = new ilUserPasswordEncoderFactory(array());
$iinst->setPasswordEncoder($encoder_factory);

//finish ILIAS setup
if(!$iinst->finishSetup()) {
    echo "Something went wrong at finish setup";
    die(1);
}

echo "Ilias successfull installed.";
die(0);