<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - HILANDO CALZADO</title>
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
                <span style="color: black; font-size: 46px;">Editar Usuario</span>
            </div>
            <div></div>
        </div>
    </header>
    <br>
    
    <?php
    include("./modelo/conexion.php");

    // Verifica si se ha enviado un ID válido a través de la URL
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta SQL para recuperar la información del usuario por su ID
        $sql = "SELECT id, nombre, Paterno, Materno, email, Direccion FROM Usuario WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Obtiene los datos del usuario
            $row = $result->fetch_assoc();
            ?>
            <div style="padding: 5px; text-align: center;">
                <form method="post" action="actualizarusuario.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="margin: 10px; display: flex; align-items: center;">
                            <label for="nombre" style="width: 150px;">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
                        </div>
                        <div style="margin: 10px; display: flex; align-items: center;">
                            <label for="Paterno" style="width: 150px;">Apellido Paterno:</label>
                            <input type="text" id="Paterno" name="Paterno" value="<?php echo $row['Paterno']; ?>">
                        </div>
                        <div style="margin: 10px; display: flex; align-items: center;">
                            <label for="Materno" style="width: 150px;">Apellido Materno:</label>
                            <input type="text" id="Materno" name="Materno" value="<?php echo $row['Materno']; ?>">
                        </div>
                        <div style="margin: 10px; display: flex; align-items: center;">
                            <label for="Direccion" style="width: 150px;">Dirección:</label>
                            <input type="text" id="Direccion" name="Direccion" value="<?php echo $row['Direccion']; ?>">
                        </div>
                        <div style="margin: 10px; display: flex; align-items: center;">
                            <label for="email" style="width: 150px;">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                        </div>
                        <!-- Agrega más campos si es necesario -->

                        <!-- Puedes ajustar el estilo según tus necesidades -->
                    </div>
                    <br>
                    <input class="circular-button" style="background-color: #BF9780; color: black;" type="submit" value="Guardar cambios">
                </form>
            </div>
            <?php
        } else {
            echo "<h1>Usuario no encontrado.</h1>";
        }
    } else {
        echo "<h1>ID de usuario no válido.</h1>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

