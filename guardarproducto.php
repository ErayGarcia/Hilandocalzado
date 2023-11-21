<?php
include("./modelo/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $precio = $_POST["precio"];
    $cantidad_stock = $_POST["cantidad_stock"];
    $categoria_id = $_POST["categoria_id"];

    // Ruta donde se guardará la imagen (ajusta la ruta según tu estructura de archivos)
    $ruta_imagen = "./img/";

    $nombre_imagen = $_FILES["imagen"]["name"];
    $imagen_tmp = $_FILES["imagen"]["tmp_name"];
    
    // Verificar si se subió una imagen válida
    if (empty($nombre_imagen) || empty($imagen_tmp)) {
        echo "Error: No se ha seleccionado una imagen.";
    } else {
        // Mover la imagen cargada a la ruta de imágenes
        if (move_uploaded_file($imagen_tmp, $ruta_imagen . $nombre_imagen)) {
            // Consulta SQL usando sentencia preparada para evitar inyección SQL
            $sql = "INSERT INTO Producto (nombre, precio, cantidad_stock, Imagen, categoria_id) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            
            // Definir una variable para la imagen
            $imagen = $ruta_imagen . $nombre_imagen;

            $stmt->bind_param("sdisi", $nombre, $precio, $cantidad_stock, $imagen, $categoria_id);

            if ($stmt->execute()) {
                echo "Producto creado con éxito.";
                header("Location: catalago.php"); // Redirige a la página de productos
            } else {
                echo "Error al crear el producto: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al cargar la imagen.";
        }
    }
}
?>
