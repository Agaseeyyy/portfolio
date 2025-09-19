<?php
class Database {
    // Database connection details
    private $host = 'localhost';
    private $db   = 'portfolio_db';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    protected $conn;
    
    public function connect() {

        try {
            // Set up DSN (Data Source Name)
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

            // Create a PDO instance
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

            // return "Connected successfully";
        } catch (\PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}

