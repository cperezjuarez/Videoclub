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
    echo "$i- $clave <button class='remove'>Eliminar</button><br/>";
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

<!-- Botón para acceder al formulario de actualizar a clientes -->
<button onclick="location.href='formUpdateCliente.php'">Actualizar cliente</button>


<!-- Lógica de JS para confimar la eliminación del cliente -->
<script>
    let removeBtns = document.querySelectorAll('.remove');

    removeBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            let borrar = confirm('¿Seguro que quieres eliminar este cliente?');
            if (borrar) {
                // Redirigimos a la página de eliminación
                window.location.href = 'removeCliente.php?cliente=' + btn.previousSibling.textContent.trim().split('- ')[1];
            };
        });
    });
</script>


</body>
</html>