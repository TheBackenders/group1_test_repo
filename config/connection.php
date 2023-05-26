<?php

namespace config;

use PDO;
use PDOException;

class Connection
{
    public $db_params;
    function __construct()
    {
        $this->db_params = require('database.php');
    }

    function getConnection()
    {

        try {
            $dsn = "mysql:host=" . $this->db_params['host'] . ";dbname=" . $this->db_params['database']; // Set the DSN (Data Source Name)
            $pdo = new PDO($dsn, $this->db_params['username'], $this->db_params['password']); // Create a new PDO instance

            // Set PDO attributes
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
