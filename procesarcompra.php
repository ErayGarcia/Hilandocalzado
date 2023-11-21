<?php
    session_start();
    include("modelo/conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comprar"])) {
        $usuario_id = 1;

        $sql_insert_compra = "INSERT INTO Compra (usuario_id, fecha_compra) VALUES ($usuario_id, NOW())";
        $conn->query($sql_insert_compra);

        $compra_id = $conn->insert_id;

        foreach ($_SESSION['carrito'] as $producto_id => $cantidad_comprada) {
            $sql_select_producto = "SELECT precio FROM Producto WHERE id = $producto_id";
            $resultado_producto = $conn->query($sql_select_producto);

            if ($resultado_producto && $resultado_producto->num_rows > 0) {
                $fila_producto = $resultado_producto->fetch_assoc();
                $precio_producto = $fila_producto['precio'];

                $sql_insert_detalle = "INSERT INTO DetalleCompra (compra_id, producto_id, cantidad_comprada, precio_unitario) VALUES ($compra_id, $producto_id, $cantidad_comprada, $precio_producto)";
                $conn->query($sql_insert_detalle);
            }
        }

        $_SESSION['carrito'] = array();

        header("Location: almacen.php");
        exit();
    }

    $conn->close();
?>
