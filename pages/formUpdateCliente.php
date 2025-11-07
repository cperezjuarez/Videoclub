<?php
    // Iniciamos sesión
    session_start();

    // Recogemos la lista de clientes de la sesión
    $clientes = $_SESSION['clientes'];
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
        <label for="username">Seleccione el cliente a actualizar:</label>
        <select id="username" name="username" required>
            <?php
                // Mostramos las opciones de clientes
                foreach ($clientes as $cliente => $valor) {
                    echo "<option value='$cliente'>$cliente</option>";
                }
            ?>
        </select><br><br>
        
        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required><br><br>
        
        <input type="submit" name="Actualizar" value="Actualizar">
    </form>
</html>