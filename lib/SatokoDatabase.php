<?php
/**
	Satoko MySQL Database Engine
	(c)Flashwave <http://flash.moe>
	Distributed under the MIT-License
*/

// Include database driver
if(file_exists('database/' . $satoko['db']['driver'] . '.php')) {
    // Require database library
    require_once 'database/' . $satoko['db']['driver'] . '.php';
} else {
    die('<h1>Failed to load database driver.</h1>Satoko depends on a working SQL library, without one it cannot function.<hr />Satoko Imageboard ' . SATOKO_VERSION);
}