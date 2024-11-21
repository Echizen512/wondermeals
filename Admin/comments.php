<?php
include '../Config/BD.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $stmt = $pdo->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: comments.php'); 
    exit;
}

$stmt = $pdo->query("SELECT * FROM comments WHERE stars >= 3 ORDER BY id DESC");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link href="./Assets/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .comment-card {
            margin-bottom: 20px;
        }
    </style>
    
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this comment?')) {
                window.location.href = 'comments.php?delete_id=' + id;
            }
        }
    </script>
</head>

<link rel="stylesheet" href="./Assets/CSS/Hover.css">
<link rel="stylesheet" href="./Assets/CSS/CRUD.css">
<link rel="stylesheet" href="./Assets/CSS/styles.css">
<link rel="stylesheet" href="./Assets/CSS/Card.css">

<main class="main-content">
    <?php include 'Includes/Header.php';?>
    <div class="container my-5">
        <h2 class="text-center" style="font-size: 28px">Comments</h2> <br>
        <?php foreach ($comments as $comment): ?>
        <div class="card comment-card">
            <div class="card-body">
                <h3 class="card-title"><?php echo htmlspecialchars($comment['name']); ?></h3>
                <p class="card-text" style="font-size: 14px;"><strong>Email:</strong> <?php echo htmlspecialchars($comment['email']); ?></p>
                <p class="card-text">
                    <strong style="font-size: 14px;">Rating:</strong>
                    <?php echo str_repeat('<span class="text-warning">&#9733;</span>', $comment['stars']); ?>
                </p>
                <p class="card-text" style="font-size: 14px;"><strong>Comment:</strong> <?php echo htmlspecialchars($comment['comment']); ?></p>
                <div class="text-center">
                <button class="btn btn-danger" onclick="confirmDelete(<?php echo $comment['id']; ?>)" style="font-size: 16px; width: 80px;">Delete</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php include 'Includes/Footer.php'?>
</main>
</html>
