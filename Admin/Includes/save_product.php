<?php
include '../../Config/BD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $active = $_POST['active'];

    // Manejo de la imagen
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Directorio donde se guardará la imagen
        $targetDir = '../../images/';
        $imageName = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $imageName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Verifica si el archivo es una imagen real
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            echo "El archivo no es una imagen.";
            exit;
        }

        // Verifica el tamaño del archivo (limite 2MB)
        if ($_FILES['image']['size'] > 2000000) {
            echo "El archivo es demasiado grande.";
            exit;
        }

        // Permitir solo ciertos tipos de archivo (ejemplo: jpg, jpeg, png)
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
            echo "Solo se permiten archivos JPG, JPEG y PNG.";
            exit;
        }

        // Mueve la imagen al directorio deseado
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $imageName; // Guardamos solo el nombre de la imagen
        } else {
            echo "Hubo un error al subir la imagen.";
            exit;
        }
    } else {
        echo "No se seleccionó ninguna imagen.";
        exit;
    }

    // Inserción o actualización en la base de datos
    if ($id) {
        $stmt = $pdo->prepare("UPDATE products SET name = :name, description = :description, price = :price, rating = :rating, image = :image, category = :category, type = :type, active = :active WHERE id = :id");
        $stmt->bindParam(':id', $id);
    } else {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, rating, image, category, type, active) VALUES (:name, :description, :price, :rating, :image, :category, :type, :active)");
    }

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':active', $active);

    $stmt->execute();
    echo 'Success';
}
?>
