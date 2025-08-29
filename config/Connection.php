<?php
// Database connection details
$host = 'localhost';
$db   = 'portfolio_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Set up DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Create a PDO instance
try {
    $conn = new PDO( $dsn, $user, $pass );
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

