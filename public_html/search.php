<?php
require "./config/db.php"; 
require "./includes/auth.php"; 

$keyword = $_GET['keyword'] ?? '';
$difficulty = $_GET['difficulty'] ?? 'All';

// 1. Start with a base query
$sql = "SELECT * FROM recipes WHERE (title LIKE :kw1 OR cuisine LIKE :kw2)";

// 2. Assign the keyword to TWO separate keys
$params = [
    ':kw1' => "%$keyword%",
    ':kw2' => "%$keyword%"
];

// 3. Add difficulty if it's not "All"
if ($difficulty !== 'All') {
    $sql .= " AND difficulty = :diff";
    $params[':diff'] = $difficulty;
}

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params); // Now the counts will match perfectly
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('search.html.twig', [
        'results' => $results,
        'keyword' => $keyword,
        'difficulty' => $difficulty,
        'session_user' => $_SESSION['username'] ?? null
    ]);
} catch (PDOException $e) {
    echo "<h1>Search Error</h1><p>" . $e->getMessage() . "</p>";
}