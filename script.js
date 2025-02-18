const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
    }
});

//Register
document.addEventListener("DOMContentLoaded", function () {
    const rolSelect = document.getElementById("rol");
    const extraFields = document.getElementById("extra-fields");

    rolSelect.addEventListener("change", function () {
        extraFields.innerHTML = ""; // Limpiar antes de agregar nuevos campos

        if (this.value === "profesor") {
            extraFields.innerHTML = `
                <input type="text" name="cedula" id="cedula" placeholder="Cédula">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                <input type="text" name="apellido" id="apellido" placeholder="Apellido">
                <input type="text" name="especialidad" id="especialidad" placeholder="Especialidad">
            `;
        } else if (this.value === "estudiante") {
            extraFields.innerHTML = `
                <input type="text" name="cedula" id="cedula" placeholder="Número de Identificación">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                <input type="text" name="apellido" id="apellido" placeholder="Apellido">
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento">
                <input type="text" name="direccion" id="direccion" placeholder="Dirección">
                <input type="tel" name="telefono" id="telefono" placeholder="Teléfono">
            `;
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar el botón por su clase
    const btnCrearCuenta = document.querySelector(".send1");

    // Agregar evento de clic
    btnCrearCuenta.addEventListener("click", function (event) {
        event.preventDefault(); // Evita que el botón intente enviar un formulario
        window.location.href = "../funeraria/register.php"; // Cambia la URL a la página de registro
    });
});
