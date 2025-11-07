<?php
// Iniciamos sesión
session_start();

// recogemos los clientes de la sesión
if (isset($_SESSION['clientes'])) {
    $clientes = $_SESSION['clientes'];
}

// Recogemos los datos del formulario
if (isset($_POST['Actualizar'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['usuario'];
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    // Comporbamos que el nuevo nombre de usuario no existe ya
    if ($username != $newUsername && array_key_exists($newUsername, $clientes)) {
        die("Error - el nombre de usuario ya existe. <a href='mainAdmin.php'>Volver</a>.<br/>");
    }

    // Actualizamos los datos del cliente en el array
    $nuevoClientes = [];
    foreach ($clientes as $cliente => $valor) {
        if ($cliente == $username) {
            $nuevoClientes[$newUsername] = $newPassword;
        } else {
            $nuevoClientes[$cliente] = $valor;
        }
    }
    // Guardamos los cambios en la sesión
    $_SESSION['clientes'] = $nuevoClientes;

    if ($_SESSION['admin'] == true) {
        // Redirigimos de vuelta al mainAdmin.php
        header("Location: mainAdmin.php");
    } else if ($_SESSION["admin"] == false) {
        // Redirigimos de vuelta al mainCliente.php
        $_SESSION['usuario'] = $newUsername;
        header("Location: mainCliente.php");
    }
}