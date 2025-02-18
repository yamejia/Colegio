<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Iniciar sesion - </title>
</head>
<body>
    <div class="form-student">
        <form action="./validatelogin.php" method="POST">
            <h1>INICIAR SESION</h1>
            <input type="email" placeholder="Email" id="email" name="email">
            <div class="password-container">
                <input type="password" id="password" placeholder="Contraseña" name="password">
                <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
            </div>
            <button type="submit" class="send">Iniciar sesion</button>
            <a href="" class="reset">¿Olvidaste tu contraseña?</a>
            <a href="./register.php" class="send1">Crear una cuenta</a>
        </form>
    </div>
    <script src="../script.js"></script>
</body>
</html>