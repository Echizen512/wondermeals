<?php
include '../Config/BD.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT id, name FROM Categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/CSS/CRUD.css">
    <link rel="stylesheet" href="./Assets/CSS/styles.css">
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <title>Products</title>
</head>

<style>

.card-product:hover {
    transform: scale(1.05);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
}

.content-card-product {
    padding: 20px;
    text-align: center;
}

.content-card-product h3 {
    margin: 10px 0;
    font-size: 1.5em;
    color: #333;
}

.content-card-product .price {
    font-size: 1.2em;
    color: #28a745;
}

.content-card-product .status {
    font-size: 1em;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
}

.active-status {
    background-color: #28a745;
    color: white;
}

.inactive-status {
    background-color: #dc3545;
    color: white;
}


.stars i {
    color: #ffc107;
}

</style>

<body>
    <main class="main-content">
        <?php include './Includes/Header.php'; ?>
        <section>
            <br>
            <h1 class="heading-1">Products</h1>
            <button id="addProductBtn" class="btn btn-success mb-3 p-3"
                style="padding: 20px; margin: 20px; font-size: 12px;"><i class="fa-solid fa-plus"></i> Add
                Product</button>
            <div class="container-products" id="products" style="padding: 20px">
                <?php foreach ($products as $product): ?>
                    <div class="card-product card" data-id="<?php echo htmlspecialchars($product['id']); ?>">
                        <div class="container-img card-img-top">
                            <img src="../images/<?php echo htmlspecialchars($product['image']); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid" />
                            <div class="button-group">
                                <span class="edit-product btn btn-primary"
                                    data-id="<?php echo htmlspecialchars($product['id']); ?>"><i
                                        class="fa-regular fa-pen-to-square"></i></span>
                                <span class="delete-product btn btn-danger"
                                    data-id="<?php echo htmlspecialchars($product['id']); ?>"><i
                                        class="fa-solid fa-trash"></i></span>
                            </div>
                        </div>
                        <div class="content-card-product card-body text-center">
                            <div class="stars">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="<?php echo ($i < $product['rating']) ? 'fa-solid' : 'fa-regular'; ?> fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <h3 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="price card-text text-center">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?>
                            </p>
                            <br>
                            <p
                                class="status card-text <?php echo $product['active'] === 'Active' ? 'active-status' : 'inactive-status'; ?>">
                                <?php echo htmlspecialchars($product['active']); ?>
                            </p>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php include './Includes/Footer.php'; ?>
    </main>

    <div id="productModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add/Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="productForm">
                    <div class="modal-body">
                        <input type="hidden" id="productId" name="id">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" step="0.01" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="0" max="5"
                                required>
                        </div>
                        <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
</div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo htmlspecialchars($category['name']); ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo:</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Featured">Featured</option>
                                <option value="Special">Special</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="active">Status:</label>
                        <select class="form-control" id="active" name="active" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="./Assets/js/jquery-3.7.0.min.js"></script>
    <script src="./Assets/js/popper.min.js"></script>
    <script src="./Assets/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#addProductBtn').click(function () {
                $('#productForm')[0].reset();
                $('#productId').val('');
                $('#productModal').modal('show');
            });

            $('.edit-product').click(function () {
                const id = $(this).data('id');
                $.ajax({
                    url: './Includes/get_product.php',
                    method: 'GET',
                    data: { id: id },
                    success: function (data) {
                        const product = JSON.parse(data);
                        $('#productId').val(product.id);
                        $('#name').val(product.name);
                        $('#description').val(product.description);
                        $('#price').val(product.price);
                        $('#rating').val(product.rating);
                        $('#image').val(product.image);
                        $('#category').val(product.category);
                        $('#type').val(product.type);
                        $('#active').val(product.active);
                        $('#productModal').modal('show');
                    }
                });
            });

            $('#productForm').submit(function (e) {
    e.preventDefault();
    console.log('Enviando datos del formulario...');
    $.ajax({
        url: './Includes/save_product.php',
        method: 'POST',
        data: new FormData(this), // Usar FormData para manejar archivos
        contentType: false,
        processData: false,
        success: function (response) {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud: ', textStatus, errorThrown);
        }
    });
});


            $('.delete-product').click(function () {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to remove this product?')) {
                    $.ajax({
                        url: './Includes/delete_product.php',
                        method: 'POST',
                        data: { id: id },
                        success: function (response) {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>