<?php
require "./includes/auth.php";
require "./config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO recipes (title, cuisine, difficulty, instructions) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['cuisine'], $_POST['difficulty'], $_POST['instructions']]);
    
    $recipe_id = $pdo->lastInsertId();
    foreach ($_POST['ingredients'] as $ing) {
        if (!empty(trim($ing))) {
            $pdo->prepare("INSERT INTO ingredients (recipe_id, ingredient_name) VALUES (?, ?)")->execute([$recipe_id, $ing]);
        }
    }
    header("Location: index.php");
    exit;
}

echo $twig->render('add.html.twig', ['session_user' => $_SESSION['username']]);