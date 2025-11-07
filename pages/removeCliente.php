<?php 
// Iniciamos la sesión
if (!isset($_SESSION)) {
    session_start();
}

// eliminamos el cliente del array de clientes
$clientes = $_SESSION['clientes'];

$newClientes = [];

foreach ($clientes as $cliente => $valor) {
    if ($cliente != $_GET['cliente']) {
        $newClientes[$cliente] = $valor;
    }
}

// guardamos los cambios en la sesión
$_SESSION['clientes'] = $newClientes;

// redirigimos de vuelta al mainAdmin.php
header("Location: mainAdmin.php");