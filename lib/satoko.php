<?php
namespace Satoko;

require_once 'satoko_templates.php';

use PDO;
use PDOException;
use Satoko\Templates;

class Board {

	var $_database;
	var $_configuration;
	var $_templates;

	// Constructor
	function __construct($config) {
		// Stop the execution if the PHP Version is older than 5.3.0
		if(version_compare(phpversion(), '5.3.0', '<'))
			die('<h1>Upgrade your PHP Version!</h1>');
	
		// Assign $config values to $_configuration
		$this->_configuration = $config;
	
		// Initialise templating engine
		$this->_templates = new Templates;
		
		// Connect to database
		$this->initDatabaseConnection();
	}
	
	// Connect to Database
	private function initDatabaseConnection() {
		try {
			// Connect to SQL server using PDO
			$this->_database = new PDO($this->_configuration['db']['connect'], $this->_configuration['db']['user'], $this->_configuration['db']['pass']);
		} catch(PDOException $e) {
			// Catch connection errors
			die('<h3>SQL Connection Error: ' . $e->getMessage() . '</h3>');
		}
	}
	
	// Get values from the configuration
	public function getConfig($key) {
		if(array_key_exists($key, $this->_configuration)) {
			return $this->_configuration[$key];
		} else {
			return false;
		}
	}
	
	// Setting board to get its data
	public function setBoard($ident) {
	
	}
}