<?php
// Incluye el archivo de conexión a la base de datos (ajusta la ruta según tu configuración)
include("./modelo/conexion.php");

function consultarProductosCategoria1() {
    global $conn; // Accede a la conexión a la base de datos global

    // Consulta SQL para seleccionar los productos de la categoría 1
    $sql = "SELECT nombre, precio, cantidad_stock, Imagen FROM producto WHERE categoria_id = 1";
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Crear un arreglo para almacenar los resultados
        $productos = array();

        while ($row = $result->fetch_assoc()) {
            $productos[] = array(
                "nombre" => $row["nombre"],
                "precio" => $row["precio"],
                "cantidad_stock" => $row["cantidad_stock"],
                "Imagen" => $row["Imagen"], // Agregar la información de la imagen
            );
        }

        // Cerrar el resultado
        $result->close();

        return $productos;
    } else {
        // Si no se encuentran productos de la categoría 1, puedes retornar un arreglo vacío o false, dependiendo de tu lógica de manejo de errores.
        return array();
    }
}

// Ejemplo de uso:
$productosCategoria1 = consultarProductosCategoria1();
// Puedes utilizar $productosCategoria1 para mostrar los resultados o realizar otras operaciones.

// NO cierres la conexión a la base de datos aquí, ya que podría ser utilizada en otras partes del código

// No es necesario cerrar la conexión aquí, déjalo abierto para otros usos

// Cierra la conexión a la base de datos solo al final del script o en el lugar apropiado

?>
