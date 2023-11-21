<?php
function consultarProductosCategoria2() {
    include("./modelo/conexion.php");

    // Consulta SQL para seleccionar los productos de la categoría 1
    $sql = "SELECT nombre, precio, cantidad_stock, Imagen FROM producto WHERE categoria_id = 2";
    $result = $conn->query($sql);

    // Crear un arreglo para almacenar los resultados
    $productos = array();

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = array(
                "nombre" => $row["nombre"],
                "precio" => $row["precio"],
                "cantidad_stock" => $row["cantidad_stock"],
                "Imagen" => $row["Imagen"], // Agregar la información de la imagen
            );
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    return $productos;
}

?>