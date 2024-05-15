<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require '../database/config.php';

$chatData = json_decode($_POST['chatData'], true);
$outgoing_id = $_SESSION['user']['id'];
$sql = "INSERT INTO messages (incoming_id, outgoing_id, message) VALUES (:incoming_id, :outgoing_id, :message)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':incoming_id', $chatData['incoming_id'], PDO::PARAM_INT);
$stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT);
$stmt->bindParam(':message', $chatData['message'], PDO::PARAM_STR);
$stmt->execute();