<?php
// Incluye el archivo de conexión a la base de datos
include('../modelo/conexion.php');

// Inicia la sesión
session_start();

// Obtén los datos del formulario
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM Usuario WHERE email = '$email' AND contraseña = '$contraseña'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Las credenciales son válidas, obtén la información del usuario
    $usuario = $result->fetch_assoc();
    
    // Almacena la información del usuario en variables de sesión
    $_SESSION['idUsuario'] = $usuario['id'];
    $_SESSION['nombreUsuario'] = $usuario['nombre'];
    $_SESSION['emailUsuario'] = $usuario['email'];
    // Puedes agregar más campos según la estructura de tu tabla Usuario

    // Verifica si el ID del usuario es igual a 1 (puedes ajustar el número de ID según tu sistema)
    if ($usuario['id'] == 1) {
        $_SESSION['rolUsuario'] = 1; // Almacena el rol en una variable de sesión
    }

    // Redirige al usuario a index.php
    header("Location: ../index.php");
    exit();
} else {
    // Almacena un mensaje de error en la sesión
    $_SESSION['error_message'] = 'Datos incorrectos. Inténtalo de nuevo.';
    header("Location: ../iniciar-sesion.php");
    exit();
}
?>
