<?php

// Database configuration settings
$host = 'localhost';
$dbName = '4900proj';
$user = 'postgres';
$password = "Artur7799";
$port = '5432';


$dsn = "pgsql:host=$host;port=$port;dbname=$dbName;";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
