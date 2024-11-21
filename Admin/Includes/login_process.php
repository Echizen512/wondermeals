<?php
session_start();
include '../../Config/BD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header('Location: ../Products.php');
        exit;
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href = 'index.php';</script>";
    }
}
?>
