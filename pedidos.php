<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Compras - HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 22px; font-size: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="img/logo.png" alt="Logo" width="200">
            </div>
            <div>
                <h2 style="font-size: 56px;">Pedidos</h2>
            </div>
            <div style="display: flex; align-items: center;">
                <img src="img/login.png" alt="Icono" width="40">
                <a href="cerrarsesion.php"><button class="circular-button" style="background-color: #FFFFEB;">Cerrar Sesión</button></a>
                <a href="agregaralcarrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
            </div>
        </div>
    </header>
    <div style="display: flex; align-items: center;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
        <div class="categoria-bar">Categoría</div>
    </div>
    <br>
    
    <div class="container">
        <h2>Pedidos</h2>
        <?php
        session_start();
        include("modelo/conexion.php");

        // Consulta para obtener todas las compras con detalles de productos y datos del usuario
        $sql_compras_admin = "SELECT Compra.id AS compra_id, Compra.fecha_compra, 
                                    Usuario.id AS usuario_id,
                                    Usuario.nombre AS nombre_usuario,
                                    Producto.id AS producto_id,
                                    Producto.nombre AS nombre_producto, 
                                    DetalleCompra.cantidad_comprada, 
                                    Producto.precio AS precio_producto,
                                    (DetalleCompra.cantidad_comprada * Producto.precio) AS total
                                    FROM Compra
                                    JOIN DetalleCompra ON Compra.id = DetalleCompra.compra_id
                                    JOIN Producto ON DetalleCompra.producto_id = Producto.id
                                    JOIN Usuario ON Compra.usuario_id = Usuario.id
                                    ORDER BY Compra.fecha_compra DESC";

        $resultado_compras = $conn->query($sql_compras_admin);

        // Verifica si la consulta fue exitosa
        if (!$resultado_compras) {
            die("Error en la consulta: " . $conn->error);
        }

        // Muestra las compras al administrador
        if ($resultado_compras->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Compra ID</th><th>Fecha de Compra</th><th>Usuario ID</th><th>Usuario</th><th>Producto ID</th><th>Producto</th><th>Cantidad Comprada</th><th>Precio Unitario</th><th>Total</th></tr>";

            $totalCompra = 0; // Variable para almacenar el total de cada compra

            foreach ($resultado_compras as $fila_compra) {
                $compra_id = $fila_compra['compra_id'];
                $fecha_compra = $fila_compra['fecha_compra'];
                $usuario_id_compra = $fila_compra['usuario_id'];
                $nombre_usuario_compra = $fila_compra['nombre_usuario'];
                $producto_id = $fila_compra['producto_id'];
                $nombre_producto = $fila_compra['nombre_producto'];
                $cantidad_comprada = $fila_compra['cantidad_comprada'];
                $precio_producto = $fila_compra['precio_producto'];
                $total = $fila_compra['total'];

                echo "<tr>";
                echo "<td>$compra_id</td><td>$fecha_compra</td><td>$usuario_id_compra</td><td>$nombre_usuario_compra</td><td>$producto_id</td><td>$nombre_producto</td><td>$cantidad_comprada</td><td>$precio_producto</td><td>$total</td>";
                echo "</tr>";

                $totalCompra += $total; // Suma el total de cada compra
            }

            echo "</table>";

            // Muestra el total general de todas las compras
            echo "<p>Total General de Compras: $totalCompra</p>";
        } else {
            echo "No se encontraron compras.";
        }

        // Cierra la conexión
        $conn->close();
        ?>
    </div>
    
    <br>
    <footer style="background-color: #452C20; color: white; padding: 25px; font-size: 24px;">
        <div style="display: flex; justify-content: space-between;">
            <div>
                Redes Sociales
                <a href="enlace-de-facebook"><i class="fab fa-facebook"></i></a>
                <a href="enlace-de-twitter"><i class="fab fa-twitter"></i></a>
                <a href="enlace-de-instagram"><i class="fab fa-instagram"></i></a>
            </div>
            <div>Hilando Calzado</div>
        </div>
    </footer>
</body>
</html>
