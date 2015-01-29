<?php
/*
 * Satoko Board Engine
 * (c)Flashwave 2013-2015 <http://flash.moe>
 * Released under the Apache License Version 2
 */

namespace Satoko;

class Board {

	public static $_CONF;
	public static $_DB;
	public $_TPL;

	// Constructor
	function __construct($config) {
		// Stop the execution if the PHP Version is older than 5.3.0
		if(version_compare(phpversion(), '5.3.0', '<'))
			die('<h3>Upgrade your PHP Version!</h3>');
	
		// Assign $config values to $_configuration
		self::$_CONF = $config;
		
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
    
    // Getting JSON files with an array fallback
    public function getJSONArray($data) {
        if(!is_array($data)) {
            if(file_exists($data)) {
                $data = json_decode(file_get_contents($data), true);
            } else {
                trigger_error('Failed to load an Array/JSON File.', E_USER_ERROR);
            }
        }
        
        return $data;
    }
    
    // Initialise Twig
    public function initTwig() {
        // Assign default values set in the configuration
        $templateName       = self::getConfig('tplName');
        $templatesFolder    = self::getConfig('tplFolder');
        
        // Initialise Twig Filesystem Loader
        $twigLoader = new \Twig_Loader_Filesystem(SATOKO_ROOT_DIRECTORY. $templatesFolder .'/'. $templateName .'/templates');

        // And now actually initialise the templating engine
        $this->_TPL = new \Twig_Environment($twigLoader, array(
           // 'cache' => SATOKO_ROOT_DIRECTORY. $satoko['cacheFolder']
        ));
        
        // Load String template loader
        $this->_TPL->addExtension(new \Twig_Extension_StringLoader());
    }
    
    // Get Stylesheets file from template
    public function getStylesheets() {
        // Assign default values set in the configuration
        $templateName       = self::getConfig('tplName');
        $templatesFolder    = self::getConfig('tplFolder');
        
        // Set path to styles.json
        $stylesJSON = SATOKO_ROOT_DIRECTORY. $templatesFolder .'/'. $templateName .'/styles.json';
        
        if(file_exists($stylesJSON)) {
            $stylesJSON = json_decode(file_get_contents($stylesJSON), true);
        } else {
            trigger_error('Failed to load styles JSON from template.', E_USER_ERROR);
        }
        
        return $stylesJSON;
    }

}