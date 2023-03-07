<?php
require '../../Config/Config.php';
$db = new Database();
$con = $db->conectar();
session_start();
$id = $_SESSION['id'];

if ($_SESSION['tipo_usuario'] == 'Empresa') {
    $sql = $con->prepare("SELECT count(id_empresa) FROM empresa where id_empresa=$id");
    $sql->execute();

    if ($sql->fetchColumn() > 0) {


        $sql = $con->prepare("SELECT * FROM empresa where id_empresa=$id LIMIT 1");
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    
        $email = $resultado['correo'];
        $direccion = $resultado['Direccion_empresa'];
        $tlf = $resultado['num_telefonico'];
        $userna = $resultado['username'];
        $passwd = $resultado['passwd'];

        $nombre = $resultado['nombre'];
        $apellido = $resultado['apellido'];
    }
}else {
    $sql = $con->prepare("SELECT count(id_usuario) FROM usuarios where id_usuario=$id");
    $sql->execute();

    if ($sql->fetchColumn() > 0) {


        $sql = $con->prepare("SELECT * FROM usuarios where id_usuario=$id LIMIT 1");
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    
        $email = $resultado['email'];
        $tlf = $resultado['num_telefonico'];
        $userna = $resultado['username'];
        $passwd = $resultado['passwd'];

        $nombre = $resultado['nombre'];
        $apellido = $resultado['apellido'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ecoturismo y áreas protegidas - Actualización de datos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/main.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="../../index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <i class="bi bi-eco"></i>
                </button>
                <h1>CepisTours</h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="../../index.php">Inicio</a></li>
                    <li class="dropdown"><a href="#"><span>Busqueda por Regiones</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="../../views/caribe/caribe.php">El Caribe</a></li>
                            <li><a href="../../views/pacifico/pacifico.php">El Pacífico</a></li>
                            <li><a href="../../views/orinoquia/orinoquia.php">La Orinoquía</a></li>
                            <li><a href="../../views/amazonia/amazonia.php">La Amazonía</a></li>
                            <li><a href="../../views/andina/andina-insular.php">Las zonas Andina e Insular</a></li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li><a href="../recientes.php">Publicaciones más recientes</a></li>
                    <?php } ?>

                    <?php if (isset($_SESSION['id']) && $_SESSION['tipo_usuario'] == 'Empresa') { ?>
                        <li><a href="./dashbo4rd/dashboard-empresa.php">Tablero</a></li>

                    <?php } ?>

                    <?php if (isset($_SESSION['id'])) { ?>
                        <!-- .Perfil -->
                        <li class="dropdown autenticado" style="margin-left: 45% ">
                            <div class="dropdown"><a href="#"><span style="font-size:16px;cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false" class="d-block text-decoration-none dropdown-toggle">
                                        <?php echo $userna; ?> </span></a>
                                <ul>
                                    <li><a class="dropdown-item" href="./usuario.php">Perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="../loguot.php">Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="dropdown"></div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header><!-- End Header -->

    <main id="main" data-aos="fade" data-aos-delay="1500">
        <!-- ======= End Page Header ======= -->

        <!-- ====== Editar perfil de Empresa ======= -->
        <?php if (isset($_SESSION['id']) && $_SESSION['tipo_usuario'] == 'Empresa') { ?>
            <div class="page-header d-flex align-items-center">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Bienvenido <?php echo $userna; ?></h2>
                            <br>
                            <marquee style="color:red;font-weight:500;font-size: 23px">
                                <h2>
                                    Existen restricciones para cuentas de negocio. <p>Póngase en contacto con los administradores admin@cepistours.com para actuzalizar datos sensibles</p>
                                </h2>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div><!-- End Page Header -->

            <!-- ======= Contact Section Empresa ======= -->
            <section id="contact" class="contact">
                <div class="container">

                    <div class="row gy-4 justify-content-center">

                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Localización:</h4>
                                    <p><?php echo $direccion; ?></p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Correo electronico:</h4>
                                    <p><?php echo $email; ?></p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telefono:</h4>
                                    <p><?php echo $tlf; ?></p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="row justify-content-center mt-4">

                        <div class="col-lg-9">
                            <form action="UpdateEmpresa.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group mt-3">
                                        <label for="alias">Alias</label><br>

                                        <input type="text" name="username" value="<?php echo $userna; ?>" class="form-control" id="alias" placeholder="Alias" required>
                                    </div>

                                    <div class="col-md-6 form-group mt-3">
                                        <label for="password">Contraseña</label><br>

                                        <input type="password" name="password" value="<?php echo $passwd; ?>" class="form-control" id="password" placeholder="Contraseña" required>
                                    </div>

                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="email">Correo electronico</label><br>

                                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" id="email" placeholder="Correo electronico" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="tlf">Numero de telefono</label><br>

                                        <input type="text" class="form-control" name="tlf" value="<?php echo $tlf; ?>" id="tlf" placeholder="Numero de teléfono" required>
                                    </div>
                                </div><br><br>

                                <div class="text-center"><button type="submit">Actualizar</button></div>

                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>
            </section><!-- End Contact Section -->
        <?php } ?>

        <!-- ====== Editar perfil de Turista ======= -->

        <?php if (isset($_SESSION['id']) && $_SESSION['tipo_usuario'] == 'Turista') { ?>
            <!-- ======= End Page Header ======= -->
            <div class="page-header d-flex align-items-center">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-6 text-center">
                            <h2>Bienvenido <?php echo $userna; ?></h2>
                            <br>
                        </div>
                    </div>
                </div>
            </div><!-- End Page Header -->
            <!-- ======= Contact Section Turista ======= -->
            <section id="contact" class="contact">
                <div class="container">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-person-lines-fill"></i>
                                <div>
                                    <h4>Nombres y Apellidos:</h4>
                                    <p><?php echo $nombre . ' ' . $apellido  ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Correo electronico:</h4>
                                    <p><?php echo $email; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-item d-flex">
                                <i class="bi bi-person-fill-check"></i>
                                <div>
                                    <h4>Alias:</h4>
                                    <p><?php echo $userna; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center mt-4">

                        <div class="col-lg-9">
                            <form action="./Updateusuario.php" method="post" role="form" class="php-email-form">

                                <div class="row">
                                    <div class="col-md-6 form-group mt-3">
                                        <label for="username">Alias</label><br>
                                        <input type="text" name="username" value="<?php echo $userna; ?>" class="form-control" id="alias" placeholder="Alias" required>
                                    </div>

                                    <div class="col-md-6 form-group mt-3">
                                        <label for="password">Contraseña</label><br>

                                        <input type="password" name="password" value="<?php echo $passwd; ?>" class="form-control" id="password" placeholder="Contraseña" required>
                                    </div>

                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="email">Correo electronico</label><br>

                                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" id="email" placeholder="Correo electronico" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="tlf">Numero de telefono</label><br>

                                        <input type="text" class="form-control" name="tlf" value="<?php echo $tlf; ?>" id="tlf" placeholder="Numero de teléfono" required>
                                    </div>

                                </div><br><br>

                                <div class="text-center"><button type="submit" name="submit">Actualizar</button></div>

                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>
            </section><!-- End Contact Section -->


    </main><!-- End #main -->

<?php } ?>

<br><br>
<!-- ======= Footer ======= -->

<div class="container">
    <footer class="py-5 footer">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Inicio</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Entidades</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Inicio</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Ministerios</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Inicio</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Subscibete a nuestro boletin.</h5>
                    <p class="text-muted">Recibiras a tu correo notificaciones de Promociones y lugares que te dejaran
                        fascinado.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Correo electronico</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Suscribete</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">
            <p class="copyright text-muted">&copy; 2022 CEPIS-Ecotours, Inc. All rights reserved.</p>
        </div>
    </footer>

    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader">
        <div class="line"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/vendor/aos/aos.js"></script>

    <!-- Template../ Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script>
        // Obtener elementos del formulario
        const form = document.querySelector(' #registro-form');
        const nombresInput = document.querySelector('#nombres');
        const apellidosInput = document.querySelector('#apellidos');
        const usernameInput = document.querySelector('#username');
        const emailInput = document.querySelector('#email');
        const passwordInput = document.querySelector('#password');
        const passwordConInput = document.querySelector('#passwordCon');
        const submitButton = document.querySelector('#registro-submit'); // Expresión regular para validar el correo electrónico const emailRegex=/^[a-zA-Z0-9]+([-._][a-zA-Z0-9]+)*@[a-zA-Z0-9]+([-.][a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/; // Función para validar campos function validarCampos() { let hayErrores=false; // Validar nombres if (nombresInput.value.trim()==='' ) { hayErrores=true; nombresInput.classList.add('is-invalid'); } else { nombresInput.classList.remove('is-invalid'); } // Validar apellidos if (apellidosInput.value.trim()==='' ) { hayErrores=true; apellidosInput.classList.add('is-invalid'); } else { apellidosInput.classList.remove('is-invalid'); } // Validar username if (usernameInput.value.trim()==='' ) { hayErrores=true; usernameInput.classList.add('is-invalid'); } else { usernameInput.classList.remove('is-invalid'); } // Validar email if (emailInput.value.trim()==='' || !emailRegex.test(emailInput.value)) { hayErrores=true; emailInput.classList.add('is-invalid'); } else { emailInput.classList.remove('is-invalid'); } // Validar password if (passwordInput.value.trim()==='' ) { hayErrores=true; passwordInput.classList.add('is-invalid'); } else { passwordInput.classList.remove('is-invalid'); } // Validar confirmación de password if (passwordConInput.value.trim()==='' ) { hayErrores=true; passwordConInput.classList.add('is-invalid'); } else if (passwordConInput.value==passwordInput.value) { passwordInput.classList.remove('is-invalid'); hayErrores=true; passwordConInput.classList.add('is-invalid'); } else { passwordConInput.classList.remove('is-invalid'); passwordInput.classList.remove('is-invalid'); } return !hayErrores; // Devolver verdadero si no hay errores } // Agregar evento al botón de submit submitButton.addEventListener('click', (e)=> {
        // Prevenir que se envíe el formulario si hay campos vacíos
        if (!validarCampos()) {
            e.preventDefault();
        }
        });

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

        passwordConInput.addEventListener('input', () => {
            passwordConInput.classList.remove('is-invalid');
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