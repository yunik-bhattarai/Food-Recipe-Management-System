<?php
require "../includes/auth.php"; // Check session
require "../config/db.php";    // Loads $pdo and $twig

$keyword = $_GET['keyword'] ?? '';
$difficulty = $_GET['difficulty'] ?? 'All';

$sql = "SELECT * FROM recipes WHERE (title LIKE :kw OR cuisine LIKE :kw)";
$params = [':kw' => "%$keyword%"];

if ($difficulty !== 'All') {
    $sql .= " AND difficulty = :diff";
    $params[':diff'] = $difficulty;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('search.html.twig', [
    'results' => $results,
    'keyword' => $keyword,
    'difficulty' => $difficulty,
    'session_user' => $_SESSION['username'] ?? null
]);