<?php
/*
 * Satoko Backend
 * (c)Flashwave 2013-2015 <http://flash.moe>
 * Released under the Apache License Version 2
 */

// Define Satoko Version
define('SATOKO_VERSION', 'testing'); // Version number for update checking and stuff like that.
define('SATOKO_ROOT_DIRECTORY', str_replace('lib', '', dirname(__FILE__))); // Might want to look if there's a better way to do this.

// Include configuration
if(!include(SATOKO_ROOT_DIRECTORY . '.config.php')) {
    die('Failed to load configuration, does .config.php exist?');
}

// Error Reporting
if($satoko['exposeErrors']) {
    error_reporting(-1);
    @ini_set('display_errors', true);
} else {
    error_reporting(0);
    @ini_set('display_errors', false);
}

// Include libraries
require_once SATOKO_ROOT_DIRECTORY . 'lib/SatokoBoard.php';
require_once SATOKO_ROOT_DIRECTORY . 'vendor/autoload.php';

// Generate path to database driver
$_DBNGNPATH = SATOKO_ROOT_DIRECTORY . 'lib/database/' . $satoko['db']['driver'] . '.php';

// Include database driver
if(file_exists($_DBNGNPATH)) {
    // Require database library
    require_once $_DBNGNPATH;
} else {
    die('<h1>Failed to load database driver.</h1>Satoko depends on a working SQL library, without one it cannot function.<hr />Satoko Imageboard ' . SATOKO_VERSION);
}
