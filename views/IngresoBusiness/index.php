<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Empresa</title>

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
        <div class="bg-img" style="background-image: url('images/img-bg-5.jpg')"></div>
        <div class="form-wrap">
            <div class="form-inner">
                <h1 class="title text-center">I N G R E S O</h1>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="pt-3" method="post">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="txtemail" id="email" placeholder="info@example.com">
                        <label for="email">Correo electronico</label>
                        <div class="invalid-feedback">
                            Por favor completa este campo.
                        </div>
                    </div>

                    <div class="form-floating">
                        <span class="password-show-toggle js-password-show-toggle"><span class="uil"></span></span>
                        <input type="password" class="form-control" name="txtpassword" id="password" placeholder="Contraseña">
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

                    <div class="mb-2">No tienes Cuenta? <a href="../contact.php">Registrarse</a></div>
                    <?php
                    require('../../Config/Conec.php');

                    if (isset($_POST['txtemail']) && $_POST['txtpassword']) {
                        // Recibimos los datos del formulario de login
                        $email = $_POST['txtemail'];
                        $password = $_POST['txtpassword'];

                        // Verificamos si el usuario o el email existen en la base de datos
                        $query = "SELECT * FROM empresa WHERE correo='$email'";
                        $result = $conn->query($query);
                        $resulta = $result->num_rows;

                        if ($resulta > 0) {
                            // Si el usuario o el email existen, verificamos si el password coincide
                            $row = $result->fetch_assoc();
                            $hash = $row['passwd'];
                            if (password_verify($password, $hash)) {
                                // Si el password coincide, iniciamos sesión y redirigimos al usuario al dashboard del turista
                                session_start();
                                $_SESSION['id'] = $row['id_empresa'];
                                $_SESSION['nombre_empresa'] = $row['nombre_empresa'];
                                $_SESSION['nombre_responsable'] = $row['nombre_responsable'];
                                $_SESSION['apellido_responsable'] = $row['apellido_responsable'];
                                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                                $_SESSION['email'] = $row['correo'];
                                $_SESSION['num_telefonico'] = $row['num_telefonico'];
                                $_SESSION['Direccion_empresa'] = $row['Direccion_empresa'];
                                $_SESSION['username'] = $row['username']; 
                                $_SESSION['pass'] = $row['passwd'];
                                $_SESSION['activo'] = $row['activo'];
                                header('Location: ../dashboard/dashbo4rd/dashboard-empresa.php');
                                exit;
                            } else {
                                // Si el usuario o el email no existen, mostramos un mensaje de error
                                echo "<p style='color: red'>algo pasa con la contraseña</p>";
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
        //Esto es JQuery
        $(document).ready(function() {
            $("#email").val("");
            $("#username").val("");
            $("#password").val("");
        });
    </script>
</body>

</html>