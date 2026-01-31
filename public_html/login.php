<?php
require "./config/db.php";
session_start();

// If already logged in, go to home
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}

// Render Template
echo $twig->render('login.html.twig', [
    'error' => $error
]);