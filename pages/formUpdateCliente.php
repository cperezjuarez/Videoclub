<?php
// Iniciamos sesión
session_start();

// Recogemos la lista de clientes de la sesión
$clientes = $_SESSION['clientes'];

// miramos de que página viene la solicitud
$referer = $_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cliente</title>
</head>

<body>
    <h1>Actualizar Cliente</h1>
    <form action="updateCliente.php" method="post">
        <?php
        // Si venimos de mainAdmin.php, mostramos el selector de clientes
        if ($referer == "http://localhost:8080/Videoclub/pages/mainAdmin.php") {
            $_SESSION['admin'] = true;
        ?>
            <label for="username">Seleccione el cliente a actualizar:</label>
            <select id="username" name="username" required>
                <?php
                // Mostramos las opciones de clientes
                foreach ($clientes as $cliente => $valor) {
                    echo "<option value='$cliente'>$cliente</option>";
                }
                ?>
            </select><br><br>
        <?php
        } else {
            $_SESSION["admin"] = false;
        }
        ?>

        <label for="newUsername">Nuevo Nombre de Usuario:</label>
        <input type="text" id="newUsername" name="newUsername" required><br><br>

        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required><br><br>

        <input type="submit" name="Actualizar" value="Actualizar">
    </form>

</html>