<?php
require "./includes/auth.php";
require "./config/db.php";

$id = $_GET['id'] ?? null;
if (!$id) { header("Location: index.php"); exit; }

// Fetch Recipe
$stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->execute([$id]);
$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$recipe) { die("Recipe not found."); }

// Fetch Ingredients
$stmt = $pdo->prepare("SELECT ingredient_name FROM ingredients WHERE recipe_id = ?");
$stmt->execute([$id]);
$ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('view.html.twig', [
    'recipe' => $recipe,
    'ingredients' => $ingredients,
    'session_user' => $_SESSION['username']
]);