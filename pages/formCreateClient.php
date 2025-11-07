<?php
if (isset($_GET['exists'])) {
    echo "el nombre de usuario ya existe, por favor elija otro.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de creación de usuarios</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <form action="createClient.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" name="Registrar" value="Registrar">
    </form>
</body>