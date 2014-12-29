<?php
/*
	Satoko MySQL Database Engine
	(c)Flashwave <http://flash.moe>
    Released under the Apache License Version 2
*/

// Define Satoko Version
define('SATOKO_VERSION', '1.0alpha1'); // Version number for update checking and stuff like that.
define('SATOKO_ROOT_DIRECTORY', str_replace('lib', '', dirname(__FILE__))); // Might want to look if there's a better way to do this.
define('PHPEXT', substr(strrchr(__FILE__, '.'), 1)); // PHP extension because some people like to alter it?

// Include configuration
require_once SATOKO_ROOT_DIRECTORY . '.config.' . PHPEXT;

// Error Reporting
if($satoko['exposeErrors']) {
    error_reporting(-1);
    @ini_set('display_errors', true);
} else {
    error_reporting(0);
    @ini_set('display_errors', false);
}

// Include libraries
require_once 'SatokoBoard.' . PHPEXT;
require_once 'SatokoTemplates.' . PHPEXT;

// Include database driver
if(file_exists(SATOKO_ROOT_DIRECTORY . 'lib/database/' . $satoko['db']['driver'] . '.' . PHPEXT)) {
    // Require database library
    require_once SATOKO_ROOT_DIRECTORY . 'lib/database/' . $satoko['db']['driver'] . '.' . PHPEXT;
} else {
    die('<h1>Failed to load database driver.</h1>Satoko depends on a working SQL library, without one it cannot function.<hr />Satoko Imageboard ' . SATOKO_VERSION);
}