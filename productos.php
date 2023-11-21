<?php
// Inicia la sesión
session_start();
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

       .container {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    label[for="categoria_id"] {
        width: 100px; /* Ancho fijo para el label de categoría */
        margin-top: 20px; /* Margen superior para el label de categoría */
    }

    input[type="text"], select, input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        font-size: 14px;
    }

    select {
        height: 50px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
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
                <a href="carrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
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
                echo '<a href="productos.php"><button class="circular-button button-almacen" style="margin-left: 20px;">Agregar</button></a>';
            }
        ?>
        
    </div>
      
    <div class="container">
        <form action="guardarproducto.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required>
            
            <label for="cantidad_stock">Cantidad en Stock:</label>
            <input type="text" id="cantidad_stock" name="cantidad_stock" required>
            
            <label for="categoria_id">Categoría:</label>
            <select id="categoria_id" name="categoria_id">
                <?php
                include("./modelo/conexion.php");

                // Verifica la conexión
                if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }

                // Consulta SQL para obtener las categorías
                $sqlCategorias = "SELECT id, nombre FROM Categoria";
                $resultCategorias = $conn->query($sqlCategorias);

                // Verifica si se encontraron categorías
                if ($resultCategorias->num_rows > 0) {
                    while ($rowCategoria = $resultCategorias->fetch_assoc()) {
                        $idCategoria = $rowCategoria['id'];
                        $nombreCategoria = $rowCategoria['nombre'];

                        // Verifica si es la categoría seleccionada
                        $selected = ($idCategoria == $row['categoria_id']) ? 'selected' : '';

                        echo "<option value='$idCategoria' $selected>$nombreCategoria</option>";
                    }
                } else {
                    echo "<option value=''>No se encontraron categorías</option>";
                }
                ?>
            </select>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>
            
            <input type="submit" value="Crear Producto">
        </form>
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
 
        