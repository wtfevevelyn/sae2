<?php
include("conexion.php");

if(isset($_POST['register'])){
    if(
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['phone']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        // Asigna los valores del formulario a variables
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        $password = trim($_POST["password"]);

        // Query para insertar los datos en la tabla 'registro'
        $consulta = "INSERT INTO registro (nombre, email, telefono, contraseña)
            VALUES ('$name', '$email', '$phone', '$password')";

        // Ejecuta la consulta
        $resultado = mysqli_query($conexion, $consulta);

        // Verifica si la consulta fue exitosa
        if ($resultado) {
            // Redirecciona a la página HTML después del registro exitoso
            header('Location: pagina.html');
            exit(); // Asegúrate de salir después de redireccionar
        } else {
            echo "<h3 class='error'>Hubo algún error</h3>";
        } 
    } else {
        echo "<h3 class='error'>Llene todos los campos para validar su registro</h3>";
    }
}
?>
