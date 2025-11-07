<?php 
// Iniciamos sesión
if(!isset($_SESSION)) {
    session_start();
}

// Saco los clientes de la sesión, inicializando si no existe
if (!isset($_SESSION['clientes']) || !is_array($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [];
}
$clientes = $_SESSION['clientes'];

// Recogemos los datos del formulario
if (isset($_POST['Registrar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Añadimos el nuevo cliente al array
    $clientes[$username] = $password;

    // Actualizamos la sesión
    $_SESSION['clientes'] = $clientes;

    // Redirigimos a la página de administración
    header("Location: mainAdmin.php");
    exit;
}