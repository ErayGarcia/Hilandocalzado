<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito-HILANDO CALZADO</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Estilo para centrar y alinear el contenido */
        .center-align {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Estilo para el texto negro en el botón */
        .black-text {
            color: black;
        }

        /* Estilo para cuadros de entrada de texto */
        .input-box {
            max-width: 300px;
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body style="background-color: #ECD6C0;">
    <header style="background-color: #BF9780; padding: 10px; font-size: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <img src="img/logo.png" alt="Logo" width="400" style="width: 200px !important;"> <!-- Ajusta el ancho a tu preferencia -->
            </div>            
            <div style="display: flex; align-items: center;">
                <h2 style="font-size: 76px;">Carrito</h2>
                <a href="agregaralcarrito.php"><img src="img/carrito.png" alt="Carrito de Compra" width="60"></a>
            </div>
            <div>
                <img src="img/login.png" alt="Icono" width="60">
                <button class="circular-button black-text" style="background-color: #FFFFEB; font-size: 20px;"><a href="iniciar-sesion.html" id="ingresa-button">cerrar sesión</a></button>
                <br>
                <a href="almacen.php"><button class="circular-button black-text" style="background-color: #FFFFEB; font-size: 20px;">Almacen</button></a>
            </div>
        </div>
    </header>
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
        <a href="index.php"><i class="fa fa-home" style="font-size: 54px;"></i></a>
        <a href="nosotros.php"><button class="circular-button black-text button-almacen">Nosotros</button></a>
    </div>

    <!-- Sección de Dirección de envío -->
    <div class="center-align" style="padding: 20px;">
        <h3>Dirección de envío</h3>
        <form>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="input-box " style="margin-bottom: 1px;"><br><br>
            <label   style="margin-bottom: 5px;" for="referencia">Referencia:</label>
            <input type="text" id="referencia" name="referencia" class="input-box"  style="margin-bottom: 1px;"><br><br>
            <label   style="margin-bottom: 5px;" for="departamento">Departamento:</label>
            <input type="text" id="departamento" name="departamento" class="input-box"  style="margin-bottom: 1px;"><br><br>
            <label   style="margin-bottom: 5px;" for="telefono">Número telefónico:</label>
            <input type="tel" id="telefono" name="telefono" class="input-box"  style="margin-bottom: 1px;"><br><br>
        </form>
        <button class="circular-button black-text" style="background-color: #FFFFEB;"><a href="metodo-pago.php" style="text-decoration: none; color: black;">Método de Pago</a></button>
    </div>
    <!-- Fin de la sección de Dirección de envío -->

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


