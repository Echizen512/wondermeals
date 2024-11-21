<?php
include '../Config/BD.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $stmt = $pdo->prepare("DELETE FROM complaints WHERE id = ?");
    $stmt->execute([$id]);
    echo "<script>
            alert('Complaint deleted successfully.');
            window.location.href = 'complaints.php';
        </script>";
    exit;
}

$stmt = $pdo->query("SELECT * FROM complaints ORDER BY id DESC");
$complaints = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link href="./Assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/css/styles.css">
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this complaint?')) {
                window.location.href = 'complaints.php?delete_id=' + id;
            }
        }
    </script>
</head>
<main class="main-content">
    <?php include 'Includes/Header.php'; ?>
    <div class="container my-5">
        <h2 class="text-center" style="font-size: 28px">Complaints</h2> <br>
        <?php foreach ($complaints as $complaint): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title" style="font-size: 14px"><?php echo htmlspecialchars($complaint['name']); ?></h3>
                <p class="card-text" style="font-size: 14px"><strong>Email:</strong> <?php echo htmlspecialchars($complaint['email']); ?></p>
                <p class="card-text" style="font-size: 14px"><strong>Complaint:</strong> <?php echo htmlspecialchars($complaint['complaint']); ?></p>
                <div class="text-center">
                <button class="btn btn-danger" style="width: 80px; font-size: 16px" onclick="confirmDelete(<?php echo $complaint['id']; ?>)">
                    Delete
                </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php include 'Includes/Footer.php'; ?>
</main>
</html>
