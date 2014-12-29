<?php
/**
	Satoko MySQL Database Engine
	(c)Flashwave <http://flash.moe>
    Distributed under the MIT-License
*/

// Define Satoko Version
define('SATOKO_VERSION', '1.0alpha1');

// Include configuration
require_once '../.config.php';

// Include libraries
require_once 'SatokoBoard.php';
require_once 'SatokoTemplates.php';

// Include database driver
if(file_exists('database/' . $satoko['db']['driver'] . '.php')) {
    // Require database library
    require_once 'database/' . $satoko['db']['driver'] . '.php';
} else {
    die('<h1>Failed to load database driver.</h1>Satoko depends on a working SQL library, without one it cannot function.<hr />Satoko Imageboard ' . SATOKO_VERSION);
}