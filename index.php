
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body style="background-color: #ECD6C0;">

    <header style="background-color: #BF9780; padding: 10px; font-size: 24px;">
        <div style="display: flex; justify-content: space-between;">
            <div>
                <img src="img/logo.png" alt="Logo" width="300"></a>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60">
                <?php
                // Inicia la sesión
                session_start();

                if (isset($_SESSION['nombreUsuario'])) {
                    echo ' ' . $_SESSION['nombreUsuario'];
                } else {
                    echo 'Invitado';
                }
                ?>
                <button class="circular-button" style="background-color: #FFFFEB;"><a href="iniciar-sesion.php" id="ingresa-button">Ingresa</a></button>
                <a href="carrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
            </div>
        </div>
    </header>

    <div style="display: flex; justify-content: space-between; margin: 20px; font-size: 20px;">
        <div>
            <a href="index.php"><i class="fa fa-home" style="font-size: 24px;"></i></a>
            <a href="almacen.php"><button class="circular-button" style="background-color: #FFFFEB;">Almacen</button></a>
            <a href="cerrarsesion.php"> <button class="circular-button" style="background-color: #FFFFEB;">Cerra Sesion</button></a>
        </div>
        <a href="nosotros.php"><button class="circular-button" style="background-color: #FFFFEB;">Nosotros</button></a>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carrusel 1.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="img/carrusel 2.jpg" class "d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="img/carrusel 3.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
    </div>

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