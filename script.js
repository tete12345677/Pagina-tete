document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    Email.send({
        Host: "smtp.gmail.com",
        Username: "guilleytetellorens@gmail.com",
        Password: "lostetes4627",
        To: "guilleytetellorens@gmail.com",
        From: "guilleytetellorens@gmail.com",
        Subject: "Nuevo registro",
        Body: "Se ha registrado un nuevo usuario con el siguiente correo electrónico: " + email
      }).then(function (response) {
        if (response === "OK") {
          showMessage('Registro exitoso. Usuario: ' + username + ', Correo electrónico: ' + email + '. Se ha enviado un correo de confirmación.');
        } else {
          showMessage('Registro exitoso. Usuario: ' + username + ', Correo electrónico: ' + email + '. No se pudo enviar el correo de confirmación.');
          console.error("Error al enviar el correo electrónico:", response);
        }
        });
    });
    function showMessage(message) {
      document.getElementById('message').textContent = message;
    }