<?php
require "../includes/auth.php";
require "../config/db.php";

$id = $_GET['id'] ?? null;

if ($id) {
    // 1. Delete ingredients first (Foreign Key constraint)
    $stmt = $pdo->prepare("DELETE FROM ingredients WHERE recipe_id = ?");
    $stmt->execute([$id]);

    // 2. Delete the recipe
    $stmt = $pdo->prepare("DELETE FROM recipes WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;