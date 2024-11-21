<?php
include '../Config/BD.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->execute([$name]);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="./Assets/css/styles.css">
<link rel="stylesheet" href="./Assets/css/Hover.css">

<body>
    <main class="main-content">
        <?php include './Includes/Header.php'; ?>
        <section class="container top-categories">
            <br>
            <h1 class="heading-1">Categories</h1>
            <button id="addCategoryBtn" class="btn btn-success mb-3 p-3" style="padding: 20px; margin: 20px; font-size: 12px; width: 120px;"><i class="fa-solid fa-plus"></i> Add Category</button>
            <div class="container-categories">
                <?php foreach ($categories as $category): ?>
                <div class="card-category" style="background-color: #7f0000;" data-category="<?php echo htmlspecialchars($category['name']); ?>">
                    <p><?php echo htmlspecialchars($category['name']); ?></p>
                    <span>
                        <button class="editCategoryBtn btn btn-primary" data-id="<?php echo $category['id']; ?>" data-name="<?php echo htmlspecialchars($category['name']); ?>">Edit</button>
                        <a class="btn btn-danger" href="?delete=<?php echo $category['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Delete</a>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <div id="categoryModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalTitle">Add Category</h2>
                <form method="post">
                    <input type="hidden" id="categoryId" name="id">
                    <label for="categoryName">Name:</label>
                    <input type="text" id="categoryName" name="name" required>
                    <div class="text-center">
                    <button type="submit" style="width:70px;">Save</button>
                </div>
                </form>
            </div>
        </div>
        <?php include './Includes/Footer.php'; ?>
    </main>

    <script src="./Assets/js/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var modal = $('#categoryModal');
            var span = $('.close');

            $('#addCategoryBtn').click(function () {
                $('#modalTitle').text('Add Category');
                $('#categoryId').val('');
                $('#categoryName').val('');
                modal.show();
            });

            $('.editCategoryBtn').click(function () {
                $('#modalTitle').text('Edit Category');
                $('#categoryId').val($(this).data('id'));
                $('#categoryName').val($(this).data('name'));
                modal.show();
            });

            span.click(function () {
                modal.hide();
            });

            $(window).click(function (event) {
                if (event.target.id == 'categoryModal') {
                    modal.hide();
                }
            });
        });
    </script>
</body>



