<?php

include("./vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
// Defining the credentials for the database
$serverName = $_ENV["DATABASE_HOST"];
$userName = $_ENV["DATABASE_USERNAME"];
$password = $_ENV["DATABASE_PASSWORD"];
$dbName = $_ENV["DATABASE_NAME"];

// Connection Object
$conn = new mysqli($serverName, $userName, $password, $dbName);

// If error occurs then display the error
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}
