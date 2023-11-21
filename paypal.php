<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paypal-HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        table {
            border: none;
        }
        table td {
            padding: 10px;
        }
    
        .footer-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .cafe-background {
            background-color: #A76E51;
        }
        .espacio {
            margin: 5px;
        }
    </style>
</head>
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 10px; font-size: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="img/logo.png" alt="Logo" width="400" style="width: 200px !important;"> <!-- Ajusta el ancho a tu preferencia -->
            </div>            
            <div style="display: flex; align-items: center;">
                <h2 style="font-size: 76px;">Carrito</h2>
                <a href="carrito.html"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60">
                <button class="circular-button" style="background-color: #FFFFEB; font-size: 20px;"><a href="iniciar-sesion.html" id="ingresa-button">cerrar sesión</a></button>
                <br>
                <a href="almacen.html"><button class="circular-button" style="background-color: #FFFFEB; font-size: 20px;">Almacen</button></a>
                <a href="nosotros.html"><button class="circular-button button-almacen">Nosotros</button></a>
            </div>
        </div>
    </header>
    <br>
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
    </div>
    <br>
    <!-- Tabla -->
    <div class="container">
        <form method="post" action="procesarcompra.php">
            <table>
                <tr>
                    <td class="cafe-background espacio">Producto</td>
                    <td class="cafe-background espacio">Precio</td>
                    <td class="cafe-background espacio">Detalle</td>
                    <td class="cafe-background espacio">Método de Pago</td>
                </tr>
                <tr>
                <?php
            include("modelo/conexion.php");

            $sql_select_carrito = "SELECT Producto.id as producto_id, Producto.nombre, Producto.precio, Producto.imagen, DetalleCompra.cantidad_comprada
                                FROM DetalleCompra
                                JOIN Producto ON DetalleCompra.producto_id = Producto.id";

            $resultado_carrito = $conn->query($sql_select_carrito);

            // Variable para almacenar el total del carrito
            $total_carrito = 0;

            if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
                while ($fila_carrito = $resultado_carrito->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><img src="' . $fila_carrito['imagen'] . '" alt="Imagen del producto" style="height: 100px; width: auto;"></td>';
                    echo '<td>$' . $fila_carrito['precio'] . '</td>';
                    echo '<td>Nombre: ' . $fila_carrito['nombre'] . '<br>Precio: $' . $fila_carrito['precio'] . '<br>Cantidad: ' . $fila_carrito['cantidad_comprada'] . '</td>';
                    echo '<td><a href="eliminardelcarrito.php?id=' . $fila_carrito['producto_id'] . '" style="text-decoration: none; background-color: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px; display: inline-block;">Eliminar</a></td>';
                    echo '</tr>';

                    // Agregar al total del carrito
                    $total_carrito += $fila_carrito['precio'] * $fila_carrito['cantidad_comprada'];
                }
            } else {
                echo '<tr><td colspan="4">No hay productos en tu carrito.</td></tr>';
            }

            // Mostrar el total del carrito (incluso si no hay productos)
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="cafe-background espacio">Total: $' . number_format($total_carrito, 2) . '</td>';
            echo '<td></td>';
            echo '</tr>';

            // Cierra la conexión
            $conn->close();
            ?>

                </tr>
                    <td colspan="4">
                        <button name="comprar" type="submit" class="circular-button" style="background-color: #FFFFEB; font-size: 20px; margin-right: 200px;">Finalizar Compra</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <br>

    <!-- Botones debajo de la tabla -->
    <div class="container">
        <div class="footer-buttons">
            <a href="almacen.php"><button class="circular-button" style="background-color: #FFFFEB; font-size: 20px; margin-right: 200px;">Continuar Comprando</button></a>
            <!-- Puedes eliminar el botón "Finalizar la compra" ya que ahora tienes el formulario -->
        </div>
    </div>
    <br><br><br>
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
