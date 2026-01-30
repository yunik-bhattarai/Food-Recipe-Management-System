<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Only redirect if there is no active session
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>