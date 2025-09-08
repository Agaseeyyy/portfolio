<?php
require_once '../config/Database.php';

$database = new Database();
$conn = $database->connect();

echo $conn;