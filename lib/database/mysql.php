<?php
/*
 * Satoko MySQL Database Engine
 * (c)Flashwave 2013-2015 <http://flash.moe>
 * Released under the Apache License Version 2
 */

namespace Satoko;

use PDO;
use PDOException;
use PDOStatement;

class Database {

    // Variable that will contain the SQL connection
    // Please refrain from referring to this, unless it's for your personal branch/purpose, despite it being public
    // it sort of defeats the "dynamic database system" I want to go for.
    public static $sql;

    // Constructor
    function __construct() {
        if(!extension_loaded('PDO')) {
            // Return error and die
            trigger_error('<b>SQL Driver</b>: PDO extension not loaded.', E_USER_ERROR);
        }

        // Initialise connection
        $this->initConnect(
            (
            Board::getConfig('db', 'unixsocket') ?
                $this->prepareSock(
                    Board::getConfig('db', 'host'),
                    Board::getConfig('db', 'database')
                ) :
                $this->prepareHost(
                    Board::getConfig('db', 'host'),
                    Board::getConfig('db', 'database'),
                    (
                        Board::getConfig('db', 'port') !== null ?
                        Board::getConfig('db', 'port') :
                        3306
                    )
                )
            ),
            Board::getConfig('db', 'username'),
            Board::getConfig('db', 'password')
        );
    }

    // Regular IP/Hostname connection method prepare function
    private function prepareHost($dbHost, $dbName, $dbPort = 3306) {
        $DSN = 'mysql:host=' . $dbHost . ';port=' . $dbPort . ';dbname=' . $dbName;

        return $DSN;
    }

    // Unix Socket connection method prepare function
    private function prepareSock($dbHost, $dbName) {
        $DSN = 'mysql:unix_socket=' . $dbHost . ';dbname=' . $dbName;

        return $DSN;
    }

    // Initialise connection using default PDO stuff
    private function initConnect($DSN, $dbUname, $dbPword) {
        try {
            // Connect to SQL server using PDO
            self::$sql = new PDO($DSN, $dbUname, $dbPword);
        } catch(PDOException $e) {
            // Catch connection errors
            trigger_error("SQL Driver: " . $e->getMessage(), E_USER_ERROR);
        }
        return true;
    }

    // Fetch array from database
    public function fetchAll($table) {
        $query = self::$sql->prepare('SELECT * FROM `' . Board::getConfig('prefix') . $table . '`');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_BOTH);

        return $result;
    }
}
