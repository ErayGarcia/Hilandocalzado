<?php
include("./modelo/conexion.php");

// Verifica si se proporcionó un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtiene el ID del usuario desde la URL
    $id = $_GET['id'];

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM Usuario WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }
} else {
    echo "ID de usuario no válido.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
