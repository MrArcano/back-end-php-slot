<?php

class Database{
    private static $istance = null;
    private $conn;

    private function __construct($config){
        // Use [mysqli]
        // $this->conn = new mysqli($config['host'], $config['user'] , $config['password'], $config['dbname']);

        // if ($this->conn->connect_error) {
        //     throw new Exception("Connection failed: " . $this->conn->connect_error);
        // }

        // Use [PDO]
        try {
            $this->conn = new PDO(
                "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}",
                $config['db']['user'],
                $config['db']['password']
            );
            // Imposta l'errore in modalità eccezione
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance($config){
        if(Database::$istance === null){
            Database::$istance = new Database($config);
        }
        return Database::$istance;
    }

    public function getConnection(){
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }

}

