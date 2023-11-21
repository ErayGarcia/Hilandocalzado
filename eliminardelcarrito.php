<?php
include("modelo/conexion.php");

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Obtiene el id de DetalleCompra antes de eliminar el producto
    $sql_obtener_id_detalle = "SELECT id FROM DetalleCompra WHERE producto_id = $producto_id";
    $resultado_obtener_id = $conn->query($sql_obtener_id_detalle);

    if ($resultado_obtener_id && $resultado_obtener_id->num_rows > 0) {
        $fila = $resultado_obtener_id->fetch_assoc();
        $detalle_id = $fila['id'];

        // Elimina el producto del carrito (esto también eliminará los registros asociados en Compra y Producto)
        $sql_eliminar_producto = "DELETE FROM DetalleCompra WHERE id = $detalle_id";
        $resultado_eliminar = $conn->query($sql_eliminar_producto);

        // Redirige de nuevo al carrito después de la eliminación
        if ($resultado_eliminar) {
            header("Location: agregaralcarrito.php");
            exit();
        } else {
            echo "Error al eliminar el producto.";
        }
    } else {
        echo "No se pudo obtener el id de DetalleCompra.";
    }
} else {
    echo "ID de producto no proporcionado.";
}

// Cierra la conexión
$conn->close();
?>
