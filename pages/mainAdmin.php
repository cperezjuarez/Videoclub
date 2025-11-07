<?php
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
    <title>Página de administración</title>
</head>
<body>
<h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>
<form method="get" action="login.php">
    <input type="submit" name="logout" content="Cerrar Sesión">
</form>

<?=
$clientes = $_SESSION['clientes'];
$productos = $_SESSION['productos'];

// Mostramos los clientes y productos
$i = 1;
echo "<p> Clientes: </p>";
foreach ($clientes as $clave => $valor) {
    echo "$i- $clave<br/>";
    $j++;
}

$j = 1;
echo "<p> Productos: </p>";
foreach ($productos as $clave => $valor) {
    echo "$j- $clave<br/>";
    $j++;
}
?>

<!-- Botón para acceder al formulario de registro de clientes -->
<button onclick="location.href='formCreateClient.php'">Registrar nuevo cliente</button>

</body>
</html>