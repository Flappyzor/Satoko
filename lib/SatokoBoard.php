<?php
/*
 * Satoko Board Engine
 * (c)Flashwave 2013-2014 <http://flash.moe>
 * Released under the Apache License Version 2
 */

namespace Satoko;

class Board {

	public static $_CONF;
	public static $_DB;
	public $_TEMPL;

	// Constructor
	function __construct($config) {
		// Stop the execution if the PHP Version is older than 5.3.0
		if(version_compare(phpversion(), '5.3.0', '<'))
			die('<h3>Upgrade your PHP Version!</h3>');
	
		// Assign $config values to $_configuration
		self::$_CONF = $config;
	
		// Initialise templating engine
		$this->_TEMPL = new Templates();
		
		// Initialise database
		self::$_DB = new Database();
	}
	
	// Get values from the configuration
	public static function getConfig($key, $subkey = null) {
		if(array_key_exists($key, self::$_CONF)) {
			if($subkey)
				return self::$_CONF[$key][$subkey];
			else
				return self::$_CONF[$key];
		} else
			return false;
	}
	
	// Setting board to get its data
	public function setBoard($ident) {
	
	}
}