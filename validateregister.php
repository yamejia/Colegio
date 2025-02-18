<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia si es necesario
$username = "root"; // Usuario de MySQL
$password = ""; // Contraseña de MySQL
$database = "colegio"; // Base de datos

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$contrasena = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña
$rol = $_POST['rol'];

// Verificar si el usuario ya está registrado
if ($rol === "profesor") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];

    $check_sql = "SELECT * FROM profesores WHERE correo = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Este correo ya está registrado como profesor.'); window.location.href='./register.php';</script>";
    } else {
        $sql = "INSERT INTO profesores (id_docente, nombre, apellido, rol, especialidad, correo, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $cedula, $nombre, $apellido, $rol, $especialidad, $email, $contrasena);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registro exitoso como Profesor.');
                setTimeout(function() { window.location.href='./login.php'; }, 1000);
            </script>";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
    }
} elseif ($rol === "estudiante") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $check_sql = "SELECT * FROM estudiantes WHERE correo = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Este correo ya está registrado como estudiante.'); window.location.href='./register.php';</script>";
    } else {
        $sql = "INSERT INTO estudiantes (id_estudiante, nombre, apellido, rol, fecha_nacimiento, direccion, telefono, correo, contraseña) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $cedula, $nombre, $apellido, $fecha_nacimiento, $direccion, $telefono, $email, $contrasena);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registro exitoso como Estudiante.');
                setTimeout(function() { window.location.href='./login.php'; }, 200);
            </script>";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
    }
} else {
    echo "<script>alert('Error: No seleccionaste un rol válido.'); window.location.href='./register.php';</script>";
}

// Cerrar conexión
$conn->close();
?>
