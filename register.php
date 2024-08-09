<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Cargar usuarios de db.json
    $users = json_decode(file_get_contents("db.json"), true);

    // Verificar si el usuario ya existe
    if (isset($users[$username])) {
        $error = "Usuario ya registrado";
    } else {
        // Almacenar el nuevo usuario
        $users[$username] = $password;
        file_put_contents("db.json", json_encode($users));
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Registro</h2>
        <form method="POST" action="register.php">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
            <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>