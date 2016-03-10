<?php
//set error_reporting auf ein böses level
error_reporting(E_ALL & ~E_STRICT);

//import autoloader für InstILIAS
require __DIR__ . '/vendor/autoload.php';

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
$github_config = $parse->read_config($json_string, "\InstILIAS\configs\GitHubConfig");

//define path vars for global use
$http_path = $server_config->httpPath();
$absolute_path = $client_config->absolute_path();

//define github executer
$git = new \InstILIAS\GitHubExecuter;
//clone git
$git->cloneGitTo("https://github.com/conceptsandtraining/ILIAS.git", $absolute_path);
//switch to branch
$git->checkoutBranch("release_5-1", $absolute_path);

//change dir to ILIAS Folder
chdir($absolute_path);
require_once $absolute_path.'libs/composer/vendor/autoload.php';
require_once("src/my_setup_header.php");
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
$iinst->writeClientIni();

//conncet to Database
$iinst->connectDatabase();

//install ILIAS Database
$iinst->installDatabase();
global $ilDB; // wird in connectDatabase() erstellt

//add updates and hotfixes
$db_updater = new \ilDBUpdate($ilDB);
$iinst->applyUpdates($db_updater);
$iinst->applyHotfixes($db_updater);

//install languages + set default language
$lng->setDbHandler($ilDB);
$iinst->installLanguages($lng);
$iinst->setDefaultLanguage();

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

die(0);