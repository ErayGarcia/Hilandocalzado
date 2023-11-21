<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén- HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Establecer un ancho y alto máximo para las imágenes */
        .column img {
            max-width: 100%;
            max-height: 150px;
        }
        .column {
             margin-bottom: 0px; /* Ajusta el valor a tu preferencia */
        }
        .image-text p {
    line-height: 1; /* Ajusta el valor a tu preferencia, 1 significa espacio simple (sin espacio adicional entre líneas) */
       }
       .column {
    margin: 10px; /* Ajusta el valor de margen según la separación deseada */
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
                <h2 style="font-size: 76px;">Niños</h2>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60">
                <a href="cerrarsesion.php"> <button class="circular-button" style="background-color: #FFFFEB;">Cerra Sesion</button></a>
                <a href="agregaralcarrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
                <br>
                <a href="almacen.php"><button class="circular-button" style="background-color: #FFFFEB; font-size: 20px;">Almacen</button></a>
            </div>
        </div>
    </header>
    <br>
    <div style="display: flex; align-items: center;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
        <!-- Aplicamos el estilo adicional a la clase .categoria-bar-text -->
        <div class="categoria-barNIÑOS categoria-bar-textNIÑOS">Zapatos de Niños</div>
        <a href="nosotros.php"><button class="circular-button button-almacen" style="margin-left: 800px;">Nosotros</button></a>
        <?php
            // Inserta el código para mostrar el botón si el usuario tiene rol igual a 1
            if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 1) {
                echo '<a href="catalago.php"><button class="circular-button button-almacen" style="margin-left: 20px;">Catalago</button></a>';
            }
        ?>
    </div>
      
    <div class="container">
    <?php
        // Incluye el archivo con la función
        include 'consultarniños.php';

        // Llama a la función para consultar productos de la categoría 1
        $productos = consultarProductosCategoria1();

        foreach ($productos as $producto) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<form action="carrito.php" method="post">';
            echo '<img src="' . $producto["Imagen"] . '" class="card-img-top" alt="Imagen del producto" style="height: 300px; width: 100%;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $producto["nombre"] . '</h5>';
            echo '<p class="card-text">Precio: $' . $producto["precio"] . '</p>';
            echo '<p class="card-text">Cantidad en stock: ' . $producto["cantidad_stock"] . '</p>';
            echo '<input type="hidden" name="producto_nombre" value="' . $producto["nombre"] . '">';
            echo '<input type="hidden" name="producto_precio" value="' . $producto["precio"] . '">';
            echo '<input type="hidden" name="producto_cantidad_stock" value="' . $producto["cantidad_stock"] . '">';
            echo '<button type="submit" class="btn btn-primary" name="comprar">Comprar</button>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
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
 
        