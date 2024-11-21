<?php
// Conexión a la base de datos
$host = 'localhost'; // Cambia esto por tu host
$dbname = 'WonderMeals'; // Cambia esto por tu nombre de base de datos
$user = 'root'; // Cambia esto por tu usuario
$pass = ''; // Cambia esto por tu contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo 'Success';
}
?>
