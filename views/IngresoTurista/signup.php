<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Personalizado-->
    <link rel="stylesheet" href="./css/style1.css">
</head>

<body>
    <script>
        $(document).ready(function() {
            $("#email").val("");
            $("#username").val("");
            $("#password").val("");
        });
    </script>
    <div class="site-wrap d-md-flex align-items-stretch">
        <div class="bg-img" style="background-image: url('images/img-bg-5.jpg')"></div>
        <div class="form-wrap">
            <div class="form-inner">
                <h1 class="title">R E G I S T R O</h1>
                <p class="caption mb-4">Crea tu cuenta en segundos.</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="pt-3" method="post" id="registro-form">
                    <div class="form-floating">
                        <label for="nombres">Nombres</label>
                        <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres" requerid>
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>
                    <div class="form-floating">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos">
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>

                    <div class="form-floating">
                        <label for="username">Alias</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Alias" requerid>
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>

                    <div class="form-floating">
                        <label for="email">Correo electronico</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="info@example.com" requerid>
                        <div class="invalid-feedback">
                            Ingresa un correo valido.
                        </div>
                    </div>

                    <div class="form-floating">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" requerid>
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>

                    <div class="form-floating">
                        <input type="hidden" name="tipo_usuario" class="form-control" value="Turista" requerid>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label for="remember" class="form-check-label">Acepto los <a href="#">
                                    Terminos de Servicio</a> y <a href="#">Politicas de Privacidad</a></label>
                        </div>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" name="submit" class="btn btn-primary" id="registro-submit">Crear cuenta</button>
                    </div>

                    <div class="mb-2">Ya eres miembro? <a href="./index.php">Ingresa</a></div>
                </form>

                <?php
                require('../../Config/Conec.php');

                if (isset($_POST['submit'])) {
                    // Recibimos los datos del formulario de login
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $tipo_usuario = $_POST['tipo_usuario'];

                    // Hash the password
                    $passwordHash = password_hash($password, PASSWORD_BCRYPT);


                    // Verificamos si el usuario o el email existen en la base de datos
                    $query = "SELECT * FROM usuarios WHERE email='$email'";
                    $result = $conn->query($query);
                    $resulta = $result->num_rows;


                    if ($resulta  > 0) {
                        echo "<p style='color: red'>El correo electronico ya esta Registrado!</p>";
                        exit;
                    }

                    if ($resulta == 0) {

                        $sql = "INSERT INTO `usuarios`(`nombre`, `apellido`,`username`, `email`, `tipo_usuario`, `passwd`) VALUES ('$nombres','$apellidos','$username','$email','$tipo_usuario','$passwordHash')";

                        $resultado  = $conn->query($sql);

                        if ($resultado == 1) {
                            echo "<p style='color: red'>Registro Exitoso!</p>";
                        }
                    }
                }
                // Cerramos la conexión a la base de datos
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custosm.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>


    <script>
        // Obtener elementos del formulario
        const form = document.querySelector('#registro-form');
        const nombresInput = document.querySelector('#nombres');
        const apellidosInput = document.querySelector('#apellidos');
        const usernameInput = document.querySelector('#username');
        const emailInput = document.querySelector('#email');
        const passwordInput = document.querySelector('#password');
        const passwordConInput = document.querySelector('#passwordCon');
        const submitButton = document.querySelector('#registro-submit');

        // Expresión regular para validar el correo electrónico
        const emailRegex = /^[a-zA-Z0-9]+([-._][a-zA-Z0-9]+)*@[a-zA-Z0-9]+([-.][a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/;


        // Función para validar campos
        function validarCampos() {
            let hayErrores = false;

            // Validar nombres
            if (nombresInput.value.trim() === '') {
                hayErrores = true;
                nombresInput.classList.add('is-invalid');
            } else {
                nombresInput.classList.remove('is-invalid');
            }

            // Validar apellidos
            if (apellidosInput.value.trim() === '') {
                hayErrores = true;
                apellidosInput.classList.add('is-invalid');
            } else {
                apellidosInput.classList.remove('is-invalid');
            }

            // Validar username
            if (usernameInput.value.trim() === '') {
                hayErrores = true;
                usernameInput.classList.add('is-invalid');
            } else {
                usernameInput.classList.remove('is-invalid');
            }

            // Validar email
            if (emailInput.value.trim() === '' || !emailRegex.test(emailInput.value)) {
                hayErrores = true;
                emailInput.classList.add('is-invalid');
            } else {
                emailInput.classList.remove('is-invalid');
            }


            // Validar password
            if (passwordInput.value.trim() === '') {
                hayErrores = true;
                passwordInput.classList.add('is-invalid');
            } else {
                passwordInput.classList.remove('is-invalid');
            }


            return !hayErrores; // Devolver verdadero si no hay errores
        }

        // Agregar eventos de cambio a los campos para quitar la clase 'is-invalid' al editarlos
        nombresInput.addEventListener('input', () => {
            nombresInput.classList.remove('is-invalid');
        });

        apellidosInput.addEventListener('input', () => {
            apellidosInput.classList.remove('is-invalid');
        });

        usernameInput.addEventListener('input', () => {
            usernameInput.classList.remove('is-invalid');
        });

        emailInput.addEventListener('input', () => {
            if (!emailRegex.test(emailInput.value)) {
                emailInput.classList.add('is-invalid');
            } else {
                emailInput.classList.remove('is-invalid');
            }
        });

        passwordInput.addEventListener('input', () => {
            passwordInput.classList.remove('is-invalid');
        });


    </script>

</body>

</html>