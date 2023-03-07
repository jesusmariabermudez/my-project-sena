<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <meta name="author" content="Untree.co">


    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Personalizado-->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <script>
        $(document).ready(function() {
            $("#email").val("");
            $("#password").val("");
        });
    </script>


    <div class="site-wrap d-md-flex align-items-stretch">
        <div class="bg-img" style="background-image: url('images/img-bg-4.jpg')"></div>
        <div class="form-wrap">
            <div class="form-inner">
                <h1 class="title text-center">I N G R E S O</h1>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="pt-3" method="post">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="email" id="email" placeholder="info@example.com">
                        <label for="email">Correo electronico</label>
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>

                    <div class="form-floating">
                        <span class="password-show-toggle js-password-show-toggle"><span class="uil"></span></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                        <label for="password">Contraseña</label>
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label for="remember" class="form-check-label">Recordar mi usuario</label>
                        </div>
                        <div><a href="../../forms/resetPasswd.php">Olvidaste tu password?</a></div>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary" id="submit">Entrar</button>
                    </div>

                    <div class="mb-2">No tienes Cuenta? <a href="./signup.php">Registrarse</a></div>
                    <?php
                    require('../../Config/Conec.php');

                    if (isset($_POST['password'])) {
                        // Recibimos los datos del formulario de login
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        // Verificamos si el usuario o el email existen en la base de datos
                        $query = "SELECT * FROM usuarios WHERE email='$email'";
                        $result = $conn->query($query);
                        $resulta = $result->num_rows;

                        if ($resulta > 0) {
                            // Si el usuario o el email existen, verificamos si el password coincide
                            $row = $result->fetch_assoc();
                            $hash = $row['passwd'];
                            if (password_verify($password, $hash)) {
                                // Si el password coincide, iniciamos sesión y redirigimos al usuario al dashboard del turista
                                session_start();
                                $_SESSION['id'] = $row['id_usuario'];
                                $_SESSION['nombre'] = $row['nombre'];
                                $_SESSION['apellido'] = $row['apellido'];
                                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['num_telefonico'] = $row['num_telefonico'];
                                $_SESSION['pass'] = $row['passwd'];

                                header('Location: ../../index.php');
                                exit;
                            } else {
                                // Si el usuario o el email no existen, mostramos un mensaje de error
                                echo "<p style='color: red'>Email y/o la contraseña son incorrectos</p>";
                            }
                        } else {
                            echo "<p style='color: red'>Email y/o la contraseña son incorrectos</p>";
                        }
                        // Cerramos la conexión a la base de datos
                        $conn->close();
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#email").val("");
            $("#username").val("");
            $("#password").val("");
        });
    </script>
    <script>
        // Obtener elementos del formulario

        const emailInput = document.querySelector('#email');
        const passwordInput = document.querySelector('#password');
        const submitButton = document.querySelector('#submit');

        // Expresión regular para validar el correo electrónico
        const emailRegex = /^[a-zA-Z0-9]+([-._][a-zA-Z0-9]+)*@[a-zA-Z0-9]+([-.][a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/;


        // Función para validar campos
        function validarCampos() {
            let hayErrores = false;


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

        // Agregar evento al botón de submit
        submitButton.addEventListener('click', (e) => {
            // Prevenir que se envíe el formulario si hay campos vacíos
            if (!validarCampos()) {
                e.preventDefault();
            }
        });

        // Agregar eventos de cambio a los campos para quitar la clase 'is-invalid' al editarlos

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

        // Función para validar que las contraseñas coinciden
        function validarContrasenas() {
            if (passwordInput.value !== passwordConInput.value) {
                passwordInput.classList.add('is-invalid');
                passwordConInput.classList.add('is-invalid');
                return false;
            } else {
                passwordInput.classList.remove('is-invalid');
                passwordConInput.classList.remove('is-invalid');
                return true;
            }
        }

        // Agregar evento al campo de confirmación de contraseña
        passwordConInput.addEventListener('input', validarContrasenas);
    </script>

</body>

</html>