<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 22px; font-size: 24px; text-align: center;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="img/logo.png" alt="Logo" width="200">
            </div>
            <div style="margin-left: -200px;"> <!-- Añadimos margen izquierdo -->
                <span style="color: black; font-size: 46px;">Registro</span>
            </div>
            <div></div>
        </div>
    </header>
    <br>
    <div style="padding: 5px; text-align: center;">
        <form method="post" action="./modulo/Insertarusuario.php">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <div style="margin: 10px; display: flex; align-items: center;">
                    <label for="nombre" style="width: 150px;">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div style="margin: 10px; display: flex; align-items: center;">
                    <label for="paterno" style="width: 150px;">Apellido Paterno:</label>
                    <input type="text" id="Paterno" name="Paterno">
                </div>
                <div style="margin: 10px; display: flex; align-items: center;">
                    <label for="materno" style="width: 150px;">Apellido Materno:</label>
                    <input type="text" id="Materno" name="Materno">
                </div>
                <div style="margin: 10px; display: flex; align-items: center;">
                    <label for="direccion" style="width: 150px;">Dirección:</label>
                    <input type="text" id="Direccion" name="Direccion">
                </div>
                <div style="margin: 10px; display: flex; align-items: center;">
                    <label for="email" style="width: 150px;">Email:</label>
                    <input type="email" id="email" name="email" >
                </div>
                <div style="margin: 10px; display: flex; align-items: center;">
                    <label for="password" style="width: 150px;">Contraseña:</label>
                    <input type="password" id="contraseña" name="contraseña" >
                </div>
            </div>
            <br>
            <input class="circular-button" style="background-color: #BF9780; color: black;" type="submit" value="Guardar">
        </form>
        <p style="margin: 20px;">¿Ya tienes una cuenta? <a href="iniciar-sesion.php" style="color: #BF9780;">Inicia Sesión</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
</body>
</html>

