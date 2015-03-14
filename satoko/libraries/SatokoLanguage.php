<?php
/*
 * Satoko Language Engine
 * (c)Flashwave 2013-2015 <http://flash.moe>
 * Released under the Apache License Version 2
 */

namespace Satoko;

class Language {

    // Language file array
    public static $_LANG;

    // Assign $array to $lang
    public static function setLanguage($array) {
        
        // Assign language to variable
        self::$_LANG = $array;
        
    }

    // Get language string
    public static function getString($key) {

		if(array_key_exists($key, self::$_LANG))
            return self::$_LANG[$key];
		else
			return null;
        
    }

}
