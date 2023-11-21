<?php
session_start();

if (!isset($_SESSION['nombreUsuario'])) {
    header("Location: iniciar-sesion.php");
    exit();
}

include("modelo/conexion.php");

$producto_nombre = isset($_POST['producto_nombre']) ? $_POST['producto_nombre'] : '';
$producto_precio = isset($_POST['producto_precio']) ? $_POST['producto_precio'] : '';
$producto_cantidad_stock = isset($_POST['producto_cantidad_stock']) ? $_POST['producto_cantidad_stock'] : '';

$usuario_id = isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : '';

if ($usuario_id === '') {
    die("Error: El usuario_id no está definido.");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$conn->begin_transaction();

$sql_insert_compra = "INSERT INTO Compra (usuario_id, fecha_compra) VALUES (?, NOW())";
$stmt_compra = $conn->prepare($sql_insert_compra);
$stmt_compra->bind_param("i", $usuario_id);

if ($stmt_compra->execute()) {
    $compra_id = $conn->insert_id;

    $sql_select_producto = "SELECT id FROM Producto WHERE nombre = ?";
    $stmt_select_producto = $conn->prepare($sql_select_producto);
    $stmt_select_producto->bind_param("s", $producto_nombre);
    $stmt_select_producto->execute();
    $resultado = $stmt_select_producto->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $producto_id = $fila['id'];

        $sql_insert_detallecompra = "INSERT INTO DetalleCompra (compra_id, producto_id, cantidad_comprada, usuario_id) VALUES (?, ?, 1, ?)";
        $stmt_detallecompra = $conn->prepare($sql_insert_detallecompra);
        $stmt_detallecompra->bind_param("iii", $compra_id, $producto_id, $usuario_id);

        if ($stmt_detallecompra->execute()) {
            $conn->commit();
            header("Location: agregaralcarrito.php");
            exit(); // Importante: salir después de la redirección para evitar la ejecución adicional del código
        } else {
            $conn->rollback();
            echo "Error al insertar en DetalleCompra: " . $stmt_detallecompra->error;
        }
    } else {
        $conn->rollback();
        echo "Error al obtener el ID del producto.";
    }
} else {
    $conn->rollback();
    echo "Error al insertar en Compra: " . $stmt_compra->error;
}

$stmt_compra->close();
$stmt_select_producto->close();
$stmt_detallecompra->close();
$conn->close();
?>
