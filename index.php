<?php
session_start();

// Si el usuario ya ha iniciado sesión, redirige al chat
if (isset($_SESSION["username"])) {
    header("Location: chat.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="index-container">
        <h1>Bienvenido al Chat</h1>
        <p>Por favor, inicia sesión o regístrate para continuar.</p>
        <div class="buttons">
            <a href="login.php" class="button">Iniciar Sesión</a>
            <a href="register.php" class="button">Registrarse</a>
        </div>
    </div>
</body>
</html>