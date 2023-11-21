<?php

include("../modelo/conexion.php");
// Obtiene los datos del formulario
$nombre = $_POST['nombre'];
$paterno = $_POST['Paterno'];
$materno = $_POST['Materno'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$direccion = $_POST['Direccion'];

// Consulta SQL para insertar los datos en la tabla Usuario
$sql = "INSERT INTO Usuario (nombre, Paterno, Materno, email, contraseña, Direccion) VALUES ('$nombre', '$paterno', '$materno', '$email', '$contraseña', '$direccion')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../iniciar-sesion.php");
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
