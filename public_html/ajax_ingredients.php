<?php
require "./config/db.php";
$term = $_GET['term'] ?? '';
$stmt = $pdo->prepare("SELECT DISTINCT ingredient_name FROM ingredients WHERE ingredient_name LIKE ? LIMIT 5");
$stmt->execute(["%$term%"]);
echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));