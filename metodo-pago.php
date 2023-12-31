<?php
include("modelo/conexion.php");

$sql_select_carrito = "SELECT Producto.id as producto_id, Producto.nombre, Producto.precio, Producto.imagen, DetalleCompra.cantidad_comprada
                       FROM DetalleCompra
                       JOIN Producto ON DetalleCompra.producto_id = Producto.id";

$resultado_carrito = $conn->query($sql_select_carrito);

// Variables para almacenar el número de artículos y el total del carrito
$num_articulos = 0;
$total_carrito = 0;

if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
    while ($fila_carrito = $resultado_carrito->fetch_assoc()) {
        // Incrementar el número de artículos
        $num_articulos++;

        // Agregar al total del carrito
        $total_carrito += $fila_carrito['precio'] * $fila_carrito['cantidad_comprada'];
    }
}

// Cierra la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito-HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Estilo para centrar y alinear el contenido */
        .center-align {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Estilo para el cuadro central */
        .info-box {
            background-color: #DDB59D;
            color: black;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            font-size: 24px;
            width: 40%; /* Ajusta el ancho según tu preferencia */
        }

        /* Estilo para la palabra "subtotal" */
        .subtotal {
            margin-top: 10px;
            font-size: 24px;
        }

        /* Estilo para los rectángulos con texto e icono */
        .rectangle {
            display: flex;
            align-items: center;
            background-color: #452C20;
            color: white;
            padding: 10px; /* Ajusta el valor del padding aquí */
            border-radius: 40px;
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
        }

        .rectangle a {
            color: white;
            margin-left: 30px; /* Separa el icono del texto */
        }
    </style>
</head>
    
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 10px; font-size: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="img/logo.png" alt="Logo" width="200">
            </div>
            <div>
                <h2 style="font-size: 76px;">Pago</h2>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60">
                <button class="circular-button" style="background-color: #FFFFEB; font-size: 20px;"><a href="iniciar-sesion.html" id="ingresa-button">cerrar sesión</a></button>
                <a href="carrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
                <br>
                <a href="almacen.php"><button class="circular-button" style="background-color: #FFFFEB; font-size: 20px;">Almacen</button></a>
            </div>
        </div>
    </header>
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
        <a href="nosotros.php"><button class="circular-button black-text button-almacen">Nosotros</button></a>
    </div>

    <!-- Sección de cuadro central -->
    <div class="center-align">
        <div class="info-box">
            <p><b>No. Artículos:</b> <?php echo $num_articulos; ?> en tu carrito</p>
            <div class="subtotal">Subtotal $<?php echo number_format($total_carrito, 2); ?></div>
            <div class="rectangle">
                PayPal
                <a href="paypal.php"><img src="img/paypal.png" alt="paypal" width="60"></a>
            </div>
        </div>
    </div>
    <br><br>
    <!-- Fin de la sección del cuadro central -->

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




    