<?php
require "../includes/auth.php";
require "../config/db.php";

// Get all recipes
$stmt = $pdo->query("SELECT * FROM recipes ORDER BY id DESC");
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Render the template
echo $twig->render('index.html.twig', [
    'recipes' => $recipes,
    'session_user' => $_SESSION['username'] ?? null
]);