<?php
require "../includes/auth.php";
require "../config/db.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

/* HANDLE FORM SUBMISSION */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST['title'];
    $cuisine = $_POST['cuisine'];
    $difficulty = $_POST['difficulty'];
    $instructions = $_POST['instructions'];

    // Update recipe
    $stmt = $pdo->prepare("
        UPDATE recipes 
        SET title = ?, cuisine = ?, difficulty = ?, instructions = ?
        WHERE id = ?
    ");
    $stmt->execute([$title, $cuisine, $difficulty, $instructions, $id]);

    // Update ingredients (delete + reinsert)
    $pdo->prepare("DELETE FROM ingredients WHERE recipe_id = ?")
        ->execute([$id]);

    if (!empty($_POST['ingredients'])) {
        foreach ($_POST['ingredients'] as $ing) {
            $ing = trim($ing);
            if ($ing !== "") {
                $pdo->prepare("
                    INSERT INTO ingredients (recipe_id, ingredient_name)
                    VALUES (?, ?)
                ")->execute([$id, $ing]);
            }
        }
    }

    header("Location: view.php?id=" . $id);
    exit;
}

/* FETCH DATA */
$r = $pdo->prepare("SELECT * FROM recipes WHERE id = ?");
$r->execute([$id]);
$recipe = $r->fetch(PDO::FETCH_ASSOC);

if (!$recipe) {
    die("Recipe not found.");
}

$i = $pdo->prepare("
    SELECT ingredient_name 
    FROM ingredients 
    WHERE recipe_id = ?
");
$i->execute([$id]);
$existing_ingredients = $i->fetchAll(PDO::FETCH_ASSOC);

/* RENDER TEMPLATE */
echo $twig->render('edit.html.twig', [
    'recipe' => $recipe,
    'ingredients' => $existing_ingredients,
    'session_user' => $_SESSION['username']
]);
