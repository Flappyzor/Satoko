<?php
/*
 * Satoko Backend
 * (c)Flashwave 2013-2015 <http://flash.moe>
 * Released under the Apache License Version 2
 */

// Define Satoko Version
define('SATOKO_VERSION', 'b20150314.1testing'); // Version number for update checking and stuff like that.
define('SATOKO_ROOT_DIRECTORY', str_replace('libraries', '', dirname(__FILE__))); // Might want to look if there's a better way to do this.

// Include default configuration
if(!include(SATOKO_ROOT_DIRECTORY . 'configuration/default.php'))
    trigger_error('<b>Satoko Init</b>: Failed to load default configuration, does configuration/default.php exist?', E_USER_ERROR);

// Include custom configuration
if(!include(SATOKO_ROOT_DIRECTORY . 'configuration/config.php'))
    trigger_error('<b>Satoko Init</b>: Failed to load custom configuration, does configuration/config.php exist?', E_USER_ERROR);

// Error Reporting
if($satoko['exposeErrors']) {
    error_reporting(-1);
    @ini_set('display_errors', true);
} else {
    error_reporting(0);
    @ini_set('display_errors', false);
}

// Include libraries
require_once SATOKO_ROOT_DIRECTORY . 'vendor/autoload.php';
require_once SATOKO_ROOT_DIRECTORY . 'libraries/SatokoBoard.php';
require_once SATOKO_ROOT_DIRECTORY . 'libraries/SatokoLanguage.php';

// Generate path to database driver
$_DBNGNPATH = SATOKO_ROOT_DIRECTORY . 'libraries/database/' . $satoko['db']['driver'] . '.php';

// Include database driver
if(file_exists($_DBNGNPATH)) {
    // Require database library
    require_once $_DBNGNPATH;
} else {
    trigger_error('Satoko Init: Failed to load database driver!', E_USER_ERROR);
}

// Generate path to database driver
$_LANGPATH = SATOKO_ROOT_DIRECTORY . 'libraries/language/' . $satoko['language'] . '.php';

// Include database driver
if(file_exists($_LANGPATH)) {
    // Require language file
    require_once $_LANGPATH;
} else {
    trigger_error('Satoko Init: Failed to load language file!', E_USER_ERROR);
}

// Initialise Board
$board = new Satoko\Board($satoko);

// Set Language
\Satoko\Language::setLanguage($lang);

// Set Board Identifier
$board->setBoard($board->getConfig('board'));

// Set page generator data
$renderData = [
    'board' => [
        'boardList' => $board->getJSONArray($board::getConfig('boardList')),
        'stylesheets' => $board->getStylesheets(),
        'stylesPath' => $board::getConfig('tplFolder') .'/'. $board::getConfig('tplName') .'/styles/',
        'rules' => $board->getJSONArray($board::getConfig('boardRules')),
        'version' => SATOKO_VERSION
    ],
    'configuration' => $satoko,
    'server' => $_SERVER,
    'lang' => $language
];
