<?php
include '../Config/BD.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->query("SELECT * FROM social_links");
$social_links = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $icon = $_POST['icon'];
    $color = $_POST['color'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    
    $stmt = $pdo->prepare("INSERT INTO social_links (icon, color, name, url) VALUES (?, ?, ?, ?)");
    $stmt->execute([$icon, $color, $name, $url]);
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $color = $_POST['color'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    
    $stmt = $pdo->prepare("UPDATE social_links SET icon = ?, color = ?, name = ?, url = ? WHERE id = ?");
    $stmt->execute([$icon, $color, $name, $url, $id]);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $stmt = $pdo->prepare("DELETE FROM social_links WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Social Links</title>
    <link href="./Assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/CSS/CRUD.css">
    <link rel="stylesheet" href="./Assets/CSS/styles.css">
    <link rel="stylesheet" href="./Assets/CSS/Card.css">
</head>
<body>
    <main class="main-content">
    <?php include './Includes/Header.php'; ?>

    <div class="container">
        <br>
        <h1 class="heading-1">Social Link</h1>
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addModal">
            Add New Link
        </button>
        
        <section class="container container-features">
            <?php foreach ($social_links as $link): ?>
                <div class="card-feature">
                <i class="<?php echo $link['icon']; ?>" style="color: <?php echo $link['color']; ?>;"></i>
                    <div class="feature-content">
                        <span><?php echo htmlspecialchars($link['name']); ?></span>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>" style="color: <?php echo htmlspecialchars($link['color']); ?>;" target="_blank">Go to <?php echo htmlspecialchars($link['name']); ?></a> <br> <br>
                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?php echo $link['id']; ?>" data-icon="<?php echo htmlspecialchars($link['icon']); ?>" data-color="<?php echo htmlspecialchars($link['color']); ?>" data-name="<?php echo htmlspecialchars($link['name']); ?>" data-url="<?php echo htmlspecialchars($link['url']); ?>">Edit</button>
                        <a href="?delete=<?php echo $link['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this link?');">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Social Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="add-icon">Icon</label>
                            <input type="text" class="form-control" id="add-icon" name="icon" required>
                        </div>
                        <div class="form-group">
                            <label for="add-color">Color</label>
                            <input type="text" class="form-control" id="add-color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="add-name">Name</label>
                            <input type="text" class="form-control" id="add-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="add-url">URL</label>
                            <input type="text" class="form-control" id="add-url" name="url" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add">Add Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Social Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="form-group">
                            <label for="edit-icon">Icon</label>
                            <input type="text" class="form-control" id="edit-icon" name="icon" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-color">Color</label>
                            <input type="text" class="form-control" id="edit-color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-name">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-url">URL</label>
                            <input type="text" class="form-control" id="edit-url" name="url" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <?php include './Includes/Footer.php'; ?>
    </main>

    <script src="./Assets/js/jquery-3.7.0.min.js"></script>
    <script src="./Assets/js/popper.min.js"></script>
    <script src="./Assets/js/bootstrap.min.js"></script>

    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var icon = button.data('icon');
            var color = button.data('color');
            var name = button.data('name');
            var url = button.data('url');
            
            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-icon').val(icon);
            modal.find('#edit-color').val(color);
            modal.find('#edit-name').val(name);
            modal.find('#edit-url').val(url);
        });
    </script>

    

</body>
</html>
