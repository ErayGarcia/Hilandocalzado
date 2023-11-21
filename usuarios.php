<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén- HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Establecer un ancho y alto máximo para las imágenes */
        .column img {
            max-width: 100%;
            max-height: 150px;
        }
        .column {
             margin-bottom: 0px; /* Ajusta el valor a tu preferencia */
        }
        .image-text p {
    line-height: 1; /* Ajusta el valor a tu preferencia, 1 significa espacio simple (sin espacio adicional entre líneas) */
       }
       .column {
    margin: 10px; /* Ajusta el valor de margen según la separación deseada */
       }

       .container {
            width: 80%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 10px; font-size: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="img/logo.png" alt="Logo" width="200">
            </div>
            <div>
                <h2 style="font-size: 76px;">Administracion</h2>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60">
                <a href="cerrarsesion.php"> <button class="circular-button" style="background-color: #FFFFEB;">Cerra Sesion</button></a>
                <a href="carrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
                <br>
                <a href="almacen.php"><button class="circular-button" style="background-color: #FFFFEB; font-size: 20px;">Almacen</button></a>
            </div>
        </div>
    </header>
    <br>
    <div style="display: flex; align-items: center;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
        <!-- Aplicamos el estilo adicional a la clase .categoria-bar-text -->
        <div class="categoria-barNIÑOS categoria-bar-textNIÑOS">Administracion De Usuarios</div>
        <a href="nosotros.php"><button class="circular-button button-almacen" style="margin-left: 800px;">Nosotros</button></a>
        <a href="usuarios.php"><button class="circular-button button-almacen">Usuarios</button></a>
    </div>
      
    <div class="container">
    <a href="agregarusuario.php"><button class="circular-button button-almacen">Agregar</button></a>
        <?php
        include("./modelo/conexion.php");

        // Consulta SQL para recuperar los usuarios
        $sql = "SELECT id, nombre, Paterno, Materno, email, Direccion FROM Usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
        
        // Inserta el código para mostrar el botón si el usuario tiene rol igual a 1
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["Paterno"] . "</td>";
                echo "<td>" . $row["Materno"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["Direccion"] . "</td>";

                // Agrega los iconos para editar y eliminar
                echo '<td>
                        <a href="editarusuario.php?id=' . $row["id"] . '"><i class="fas fa-edit"></i></a>
                        <a href="eliminarusuario.php?id=' . $row["id"] . '"><i class="fas fa-trash"></i></a>
                    </td>';

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h1>No se encontraron usuarios.</h1>";
        }
        ?>
    </div>
    <br>
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
</body>
</html>
