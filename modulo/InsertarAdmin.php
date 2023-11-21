<?php

include("../modelo/conexion.php");

// Obtiene los datos del formulario
$nombre = $_POST['nombre'];
$paterno = $_POST['Paterno'];
$materno = $_POST['Materno'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$direccion = $_POST['Direccion'];

// Validación: Verifica que todos los campos estén llenos
if (empty($nombre) || empty($paterno) || empty($materno) || empty($email) || empty($contraseña) || empty($direccion)) {
    $error_message = "Todos los campos son obligatorios. Por favor, completa el formulario.";
    header("Location: ../agregarusuario.php?error_message=" . urlencode($error_message));
} else {
    // Consulta SQL para insertar los datos en la tabla Usuario
    $sql = "INSERT INTO Usuario (nombre, Paterno, Materno, email, contraseña, Direccion) VALUES ('$nombre', '$paterno', '$materno', '$email', '$contraseña', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../usuarios.php");
    } else {
        $error_message = "Error al registrar el usuario: " . $conn->error;
        header("Location: agregarusuario.php?error_message=" . urlencode($error_message));
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
