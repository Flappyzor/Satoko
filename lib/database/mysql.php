<?php
/**
	Satoko MySQL Database Engine
	(c)Flashwave <http://flash.moe>
    Distributed under the MIT-License
*/

namespace Satoko;

use PDO;
use PDOException;
use PDOStatement;

class Database {

    public static $sql;

    // Constructor
    function __construct() {
        if(!extension_loaded('PDO')) {
            // Return error and die
            die('<h3>PDO extension not loaded.</h3>');
        }

        // Initialise connection
        $this->initConnect(
            (
            Board::getConfig('unixsocket') ?
                $this->prepareSock(
                    Board::getConfig('host'),
                    Board::getConfig('database')
                ) :
                $this->prepareHost(
                    Board::getConfig('host'),
                    Board::getConfig('database'),
                    (
                    Board::getConfig('port') !== null ?
                        Board::getConfig('port') :
                        3306
                    )
                )
            ),
            Board::getConfig('username'),
            Board::getConfig('password')
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
            die("<h3>" . $e->getMessage() . "</h3>");
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
