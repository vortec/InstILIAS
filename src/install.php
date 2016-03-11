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
$github_config = $parser->read_config($json_string, "\InstILIAS\configs\GitHubConfig");

//define path vars for global use
$http_path = $server_config->httpPath();
$absolute_path = $server_config->absolutePath();

//define github executer
$git = new \InstILIAS\GitHubExecuter;
//clone git
$git->cloneGitTo($github_config->gitUrl(), $absolute_path);
//switch to branch
$git->checkoutBranch($github_config->gitBranchName(), $absolute_path);

//change dir to ILIAS Folder
chdir($absolute_path);
require_once $absolute_path.'/libs/composer/vendor/autoload.php';
require_once("my_setup_header.php");
require_once("Services/Database/classes/class.ilDBUpdate.php");
require_once("setup/classes/class.ilSetup.php");

//define setup object
$setup = new \ilSetup(true,"admin");

//define installator
$iinst = new \InstILIAS\IliasReleaseInstallator($path, $setup, $func);

//set configs to installator
$iinst->setConfigFiles($client_config, $db_config, $language_config, $log_config, $server_config, $setup_config, $tools_config);

//create ilias.ini.php
$iinst->writeIliasIni();

//create client.ini.php + folder structure
$ret = $iinst->writeClientIni();
if(!$ret) {
	die("keine client id");
}

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
$iinst->setPasswordEncoder();

//finish ILIAS setup
if(!$iinst->finishSetup()) {
    echo "Something went wrong at finish setup";
    die(1);
}

echo "Ilias successfull installed.";
die(0);