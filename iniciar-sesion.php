<?php
// Inicia la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 22px; font-size: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="index.php"><i class="fa fa-home" style="font-size: 35px; color: black;"></i></a>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60" style="vertical-align: middle;">
                <span style="color: black; font-size: 46px; vertical-align: middle;">INICIAR SESIÓN</span>
            </div>
            <div>
                <img src="img/logo.png" alt="Logo" width="170">
            </div>
        </div>
    </header>
    <br>
    <h2 style="font-weight: normal;">Iniciar Sesión con tu cuenta de correo</h2>
    <div style="padding: 20px; text-align: center;">
        <form method="post" action="./modulo/Sesion.php">
            <div style="margin: 20px;">
                <label for="email" style="width: 150px;">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div style="margin: 20px;">
                <label for="contraseña"  style="width: 150px;">contraseña:</label>
                <input type="password" id="contraseña" name="contraseña">
            </div>
            <input class="circular-button" style="background-color: #BF9780; color: black;" type="submit" value="Iniciar Sesion">
            <br><br>
        </form>
        <p style="margin: 20px;">¿No tienes cuenta? <a href="registro.php" style="color: #BF9780;">Regístrate</a></p>

        <?php
        // Comprueba si hay un mensaje de error almacenado en la sesión
        if (isset($_SESSION['error_message'])) {
            echo '<div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; text-align: center; display: inline-block; font-weight: bold;">' . $_SESSION['error_message'] . '</div>';
            // Limpia el mensaje de error para que no se muestre nuevamente
            unset($_SESSION['error_message']);
        }
        ?>
    </div>
    <br><br><br><br>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
</body>
</html>
