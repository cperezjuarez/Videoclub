<?php

// Incluimos las clases necesarias
include "../autoload.php";
use app\Videoclub;

if(!isset($_SESSION)) {
    // Array de usuarios y productos (simulando una base de datos)
    $clientes = array(
        'user1' => 'user1',
        'user2' => 'user2'
    );
    $productos = array(
        'producto1' => '1',
        'producto2' => '2'
    );
    
    
    // Creamos un videoclub y añadimos algunos socios y productos
    $vc = new Videoclub("Videoclub");
    $vc->incloureSoci("cloud");
    $vc->incloureJoc("Final Fantasy VII", 59.99, "PS4", 1, 1);
    $vc->llogarSociProducte(1, 1); // Simulamos que el socio 1 ha alquilado el producto 1
    
    // Añadimos las credenciales a los socios
    $vc->assignarCredencialSoci(1, "cloud", "cloud");
    
    // Por cada socio en el videoclub, añadimos su usuario y contraseña al array de clientes
    foreach ($vc->getSocis() as $soci) {
        $clientes[$soci->getUsername()] = $soci->getPassword();
    }
}



// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    // validamos que recibimos los parámetros
    if (empty($usuario) || empty($password)) {
        echo "Debes introducir un usuario y contraseña";
        header("Location: ../index.php?error");

    } else if ($usuario != "admin" && $password != "admin") {
        // USER
        $encontrado = false;
        foreach ($clientes as $cliente => $valor) {
            if ($usuario == $cliente && $password == $valor) {
                // almacenamos el usuario en la sesión
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['clientes'] = $clientes;
                $_SESSION['productos'] = $productos;
                $encontrado = true;

                // almacenamos los productos del cliente
                $_SESSION['productosCliente'] = $vc->cercarProductesPerClient($usuario);
            }
        }

        if ($encontrado) {
            // redirigimos a la página principal
            header("Location: mainCliente.php");
        } else {
            // redirigimos a la página de registro
            header("Location: ../index.php?error");
        }

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
} else if (isset($_GET['logout'])) {
    // Recuperamos la información de la sesión
    session_start();

    // Y la destruimos
    session_destroy();
    header("Location: ../index.php");
}