<?php
header('Content-Type: application/json');

// Database connection settings
$host = 'localhost';
$dbName = '4900proj';
$user = 'postgres';
$password = "Artur7799";
$port = '5432';

$dsn = "pgsql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch a random movie
$stmt = $pdo->query("SELECT * FROM movie ORDER BY RANDOM() LIMIT 1");
$movie = $stmt->fetch();

echo json_encode($movie);
?>