<?php
    // Incluimos las clases necesarias
    include "../autoload.php";
    use app\Videoclub;

    // Recuperamos la información de la sesión
    if(!isset($_SESSION)) {
        session_start();
    }

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) {
       die("Error - debe <a href='../index.php'>identificarse</a>.<br/>");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de usuario</title>
</head>
<body>
    <h1>Bienvenido <?= $_SESSION['usuario'] ?></h1> 
    <!-- productos del cliente -->
     <ul>
        <?php 
            foreach($_SESSION['productosCliente'] as $producto) {
                echo "<li>" . $producto->titol . "</li>";
            }
        ?>
     </ul>
    <form method="get" action="login.php">
        <input type="submit" name="logout" content="Cerrar Sesión">
    </form>
</body>
</html>
