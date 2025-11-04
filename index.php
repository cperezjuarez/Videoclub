<?php
if (isset($_GET['error'])) {
    echo "Usuario o contraseña incorrectos";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="post" action="./pages/login.php">
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="passw">Password</label>
        <input type="password" name="password">

        <input type="submit" name="enviar" content="Enviar">
    </form>
</body>
</html>