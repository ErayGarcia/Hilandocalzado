<?php
include("./modelo/conexion.php");

// Verificar si se ha proporcionado el ID del producto a editar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Consulta SQL para obtener los datos del producto a editar
    $sql = "SELECT * FROM Producto WHERE id = $producto_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verificar si se ha enviado el formulario de edición
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos actualizados del formulario
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad_stock = $_POST['cantidad_stock'];
            $categoria_id = $_POST['categoria_id'];

            // Manejar la carga de la nueva imagen
            $ruta_imagen = "./img/";

            if (isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["name"])) {
                $nombre_imagen = $_FILES["imagen"]["name"];
                $imagen_tmp = $_FILES["imagen"]["tmp_name"];

                // Mover la nueva imagen cargada a la ruta de imágenes
                if (move_uploaded_file($imagen_tmp, $ruta_imagen . $nombre_imagen)) {
                    // Actualizar la columna Imagen en la base de datos con la nueva imagen
                    $update_sql = "UPDATE Producto SET nombre = '$nombre', precio = $precio, cantidad_stock = $cantidad_stock, categoria_id = $categoria_id, Imagen = '$ruta_imagen$nombre_imagen' WHERE id = $producto_id";
                } else {
                    echo "Error al cargar la nueva imagen.";
                }
            } else {
                // Si no se cargó una nueva imagen, actualizar los demás datos sin modificar la imagen existente
                $update_sql = "UPDATE Producto SET nombre = '$nombre', precio = $precio, cantidad_stock = $cantidad_stock, categoria_id = $categoria_id WHERE id = $producto_id";
            }

            if ($conn->query($update_sql) === TRUE) {
                // Producto actualizado con éxito
                header("Location: catalago.php"); // Redirige a la página de productos o a donde desees
                exit();
            } else {
                echo "Error al actualizar el producto: " . $conn->error;
            }
        }
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
   
   body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
                <h2 style="font-size: 56px;">Editar Productos</h2>
            </div>
            <div style="display: flex; align-items: center;">
                <img src="img/login.png" alt="Icono" width="40">
                <a href="cerrarsesion.php"> <button class="circular-button" style="background-color: #FFFFEB;">Cerra Sesion</button></a>
                <a href="carrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
            </div>
        </div>
    </header>
    <div style="display: flex; align-items: center;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
        <div class="categoria-bar">Editar Productos</div>
        <a href="nosotros.php"><button class="circular-button button-almacen" style="margin-left: 800px;">Nosotros</button></a>
    </div>
    <br>
    
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" step="0.01" value="<?php echo $row['precio']; ?>" required>

            <label for="cantidad_stock">Cantidad en Stock:</label>
            <input type="number" name="cantidad_stock" value="<?php echo $row['cantidad_stock']; ?>" required>

            <label for="categoria_id">Categoría:</label>
            <select id="categoria_id" name="categoria_id">
                <?php
                include("./modelo/conexion.php");

                // Verifica la conexión
                if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }

                // Consulta SQL para obtener las categorías
                $sqlCategorias = "SELECT id, nombre FROM categoria";
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

            <label for="imagen">Nueva Imagen:</label>
            <input type="file" name="imagen" accept="image/*">

            <input type="submit" value="Guardar Cambios">
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



<?php
    } else {
        echo "No se encontró el producto a editar.";
    }
} else {
    echo "ID de producto no válido.";
}
?>
