<?php
// Recuperamos la información de la sesión
if(!isset($_SESSION)) {
    session_start();
}

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='../index.php'>identificarse</a>.<br/>");
}

$clientes = $_SESSION['clientes'];
$productos = $_SESSION['productos'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de administración</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>

<section class="listaContainer">
    <h2>Clientes</h2>
    <ul>
        <?php
            // Mostramos los clientes
            $i = 1;
            foreach ($clientes as $clave => $valor) {
                echo "<li>$i- $clave <button class='remove'>Eliminar</button></li>";
                $i++;
            }
        ?>
    </ul>
</section>

<section class="listaContainer">
    <h2>Productos</h2>
    <ul>
        <?php
            // Mostramos los productos
            $i = 1;
            foreach ($productos as $producto => $id) {
                echo "<li>$i- $producto - ID: $id</li>";
                $i++;
            }
        ?>
    </ul>
</section>

<!-- Botón para acceder al formulario de registro de clientes -->
<button class="btn" onclick="location.href='formCreateClient.php'">Registrar nuevo cliente</button>

<!-- Botón para acceder al formulario de actualizar a clientes -->
<button class="btn" onclick="location.href='formUpdateCliente.php'">Actualizar cliente</button>

<form method="get" action="login.php">
    <input type="submit" name="logout" value="Logout">
</form>


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