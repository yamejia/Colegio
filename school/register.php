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
        <form action="./validateregister.php" method="post">
            <h1>CREA UNA CUENTA</h1>
            <input type="email" placeholder="Email" name="email" id="email" required>
            <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Contraseña">
            <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
            </div>
            <div class="opti">
            <select name="rol" id="rol">
                <option selected disabled>Selecciona tu rol</option>
                <option value="estudiante">Estudiante</option>
                <option value="profesor">Profesor</option>
            </select>
            </div>
            <div id="extra-fields"></div>
            <button type="submit" class="send">Crear cuenta</button>
            <a href="./login.php" class="reset">Volver</a>
        </form>
    </div>
    <script src="../script.js"></script>
</body>
</html>