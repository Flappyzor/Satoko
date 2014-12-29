<?php
/*
	Satoko Board
	(c)Flashwave <http://flash.moe>
	Released under the Apache License Version 2
*/

namespace Satoko;

class Board {

	public $_database;
	public $_configuration;
	public $_templates;

	// Constructor
	function __construct($config) {
		// Stop the execution if the PHP Version is older than 5.3.0
		if(version_compare(phpversion(), '5.3.0', '<'))
			die('<h3>Upgrade your PHP Version!</h3>');
	
		// Assign $config values to $_configuration
		$this->_configuration = $config;
	
		// Initialise templating engine
		$this->_templates = new Templates;
		
		// Connect to database
		//$this->initDatabaseConnection();
	}
	
	// Get values from the configuration
	public static function getConfig($key) {
		if(array_key_exists($key, self::$_configuration)) {
			return self::$_configuration[$key];
		} else {
			return false;
		}
	}
	
	// Setting board to get its data
	public function setBoard($ident) {
	
	}
}