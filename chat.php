<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];

// Cargar mensajes de message_user.json
$messages = json_decode(file_get_contents("message_user.json"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room = $_POST["room"];
    $message = $_POST["message"];

    // Añadir nuevo mensaje
    $messages[] = [
        "username" => $username,
        "room" => $room,
        "message" => $message
    ];

    // Guardar mensajes actualizados
    file_put_contents("message_user.json", json_encode($messages));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="chat-window">
            <div class="chat-header">
                <img src="img/icon.png" alt="Icono" class="header-icon">
                <h2>Chat</h2>
                <img src="img/config.png" alt="Configuración" class="header-icon">
            </div>
            <div id="chat" class="chat-body">
                <?php foreach ($messages as $msg): ?>
                    <p><strong><?= $msg["username"] ?>:</strong> <?= $msg["message"] ?></p>
                <?php endforeach; ?>
            </div>
            <div class="chat-footer">
                <form method="POST" action="chat.php">
                    <input type="text" name="room" placeholder="Sala">
                    <input type="text" name="message" placeholder="Escribe un mensaje...">
                    <button type="submit">Enviar</button>
                </form>
                <a href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
