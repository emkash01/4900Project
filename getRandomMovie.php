<?php
header('Content-Type: application/json');

require 'database/config.php';

// Fetch a random movie
$stmt = $pdo->query("SELECT * FROM movie ORDER BY RANDOM() LIMIT 1");
$movie = $stmt->fetch();

echo json_encode($movie);
?>