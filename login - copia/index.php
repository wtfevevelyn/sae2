    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="style.css"> 
    </head>
    <body>

        <form method="post"> 

            <h2>Bienvenido S.A.E</h2>
            

            <p>inicia tu registro  </p>

            <div class="input-wrapper">
                <input type="text" name="name" placeholder="Nombre">
                <img class="input-icon" src="images/name.svg" alt=""> 
            </div>

            <div class="input-wrapper">
                <input type="email" name="email" placeholder="Email">
                <img class="input-icon" src="images/email.svg" alt=""> 
            </div>

            <div class="input-wrapper">
                <input type="tel" name="phone" placeholder="Telefono">
                <img class="input-icon" src="images/phone.svg" alt=""> 
            </div>

            <div class="input-wrapper">
                <input type="password" name="password" placeholder="contraseña">
                <img class="input-icon" src="images/password.svg" alt=""> 
            </div>

            <input class="btn" type="submit" name="register" value="Enviar"> 

        </form>

        <?php 
        include("conexion.php");

        if(isset($_POST['register'])){
            if(
                strlen($_POST['name']) >= 1 &&
                strlen($_POST['email']) >= 1 &&
                strlen($_POST['phone']) >= 1 &&
                strlen($_POST['password']) >= 1
            ) {

                $name = trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $phone = trim($_POST["phone"]);
                $password = trim($_POST["password"]);

                
                $consulta = "INSERT INTO registro (nombre, email, telefono, contraseña)
                    VALUES ('$name', '$email', '$phone', '$password')";

                
                $resultado = mysqli_query($conexion, $consulta);

                
                if ($resultado) {
                    echo "<h3 class='success'>Tu registro ha sido exitoso</h3>";
                } else {
                    echo "<h3 class='error'>Hubo algún error</h3>";
                } 
            } else {
                echo "<h3 class='error'>Llene todos los campos  para validar su registro </h3>";
            }
        }
        ?>

    </body>
    </html>
