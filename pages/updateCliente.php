<?php 
// Iniciamos sesión
session_start();

// recogemos los clientes de la sesión
if (isset($_SESSION['clientes'])) {
    $clientes = $_SESSION['clientes'];
}

// Recogemos los datos del formulario
if (isset($_POST['Actualizar'])) {
    $username = $_POST['username'];
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    // Actualizamos los datos del cliente en el array
}
?>