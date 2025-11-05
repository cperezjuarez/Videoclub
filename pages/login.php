<?php
$clientes = array(
    'user1' => 'user1',
    'user2' => 'user2'
);
$productos = array(
    'producto1' => '1',
    'producto2' => '2'
);

// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    // validamos que recibimos los parámetros
    if (empty($usuario) || empty($password)) {
        echo "Debes introducir un usuario y contraseña";
        header("Location: index.php");
    } else {
            // USER
        if ($usuario == "user" && $password == "user") {
            // almacenamos el usuario en la sesión
            session_start();
            $_SESSION['usuario'] = $usuario;
            // redirigimos a la página principal
            header("Location: main.php");

            // ADMIN
        } else if ($usuario == "admin" && $password == "admin") {
            // almacenamos el usuario en la sesión
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clientes'] = $clientes;
            $_SESSION['productos'] = $productos;
            // redirigimos a la página de administración
            header("Location: mainAdmin.php");

        } else {
            session_start();
            // Si las credenciales no son válidas, se vuelven a pedir
            header("Location: ../index.php?error");
        }
    }
} else if (isset($_GET['logout'])) {
    // Recuperamos la información de la sesión
    session_start();

    // Y la destruimos
    session_destroy();
    header("Location: ../index.php");
}