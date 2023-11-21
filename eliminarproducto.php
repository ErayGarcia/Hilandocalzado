<?php
include("./modelo/conexion.php");

// Verificar si se ha proporcionado el ID del producto a eliminar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM Producto WHERE id = $producto_id";

    if ($conn->query($sql) === TRUE) {
        // Producto eliminado con éxito
        header("Location: catalago.php"); // Redirige de nuevo a la página de productos o a donde desees
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    echo "ID de producto no válido";
}
?>
