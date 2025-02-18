<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "colegio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['password']; // Se mantiene como 'password' porque así está en el formulario

// Buscar en la tabla de profesores
$sql_profesor = "SELECT * FROM profesores WHERE correo = ?";
$stmt = $conn->prepare($sql_profesor);
$stmt->bind_param("s", $email);
$stmt->execute();
$result_profesor = $stmt->get_result();

if ($result_profesor->num_rows > 0) {
    $profesor = $result_profesor->fetch_assoc();

    // Verificar contraseña con password_verify
    if (password_verify($contrasena, $profesor['contraseña'])) { // ✅ Se usa 'contraseña' como está en la BD
        $_SESSION['user'] = $profesor['correo'];
        $_SESSION['rol'] = "profesor";

        echo "<script>
            alert('Inicio de sesión exitoso como Profesor.');
            setTimeout(function() { window.location.href='./profesor.php'; });
        </script>";
        exit();
    }
}

// Buscar en la tabla de estudiantes
$sql_estudiante = "SELECT * FROM estudiantes WHERE correo = ?";
$stmt = $conn->prepare($sql_estudiante);
$stmt->bind_param("s", $email);
$stmt->execute();
$result_estudiante = $stmt->get_result();

if ($result_estudiante->num_rows > 0) {
    $estudiante = $result_estudiante->fetch_assoc();

    // Verificar contraseña con password_verify
    if (password_verify($contrasena, $estudiante['contraseña'])) { // ✅ Se usa 'contraseña' como está en la BD
        $_SESSION['user'] = $estudiante['correo'];
        $_SESSION['rol'] = "estudiante";

        echo "<script>
            alert('Inicio de sesión exitoso como Estudiante.');
            setTimeout(function() { window.location.href='./estudiante.php'; });
        </script>";
        exit();
    }
}

// Si no se encuentra el usuario o la contraseña es incorrecta
echo "<script>
    alert('Correo o contraseña incorrectos.');
    window.location.href='./login.php';
</script>";

$conn->close();
?>
