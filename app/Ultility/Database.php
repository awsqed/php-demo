<?php
namespace App\Ultility;

use PDO;
use PDOException;

class Database {

    protected $pdo;
    private   $dbHost     = 'localhost';
    private   $dbUsername = 'root';
    private   $dbPassword = 'PiN@182597';
    private   $dbName     = 'php_demo';

    function __construct() {
        try {
            $this->pdo = new PDO('mysql:host='. $this->dbHost .';dbname='. $this->dbName, $this->dbUsername, $this->dbPassword);
        } catch (PDOException $e) {
            die(json_encode([
                'success' => false,
                'message' => 'Failed to establish new database connection. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

    protected function checkConnection() {
        if (!$this->pdo) {
            die(json_encode([
                'success' => false,
                'message' => 'Database connection not found. Error: '. $e->getMessage() .'.'
            ]));
        }
    }

}
