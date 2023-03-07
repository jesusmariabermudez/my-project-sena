<?php
require '../../../Config/Config.php';
#require_once 'Config/env.php';
$db = new Database(); #instancio la clase Database para usar la funcion conectar
$con = $db->conectar();

session_start();
$id = $_SESSION['id'];

$sql = $con->prepare("SELECT * FROM image 
inner join publicaciones on image.idimage = publicaciones.id_imagen WHERE id_usuario='$id'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mis Publicaciones</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Main CSS  -->
    <link href="../../../assets/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Se debe cambiar Turista por empresa.-->

            <?php if (isset($_SESSION['id']) && $_SESSION['tipo_usuario'] == 'Empresa') { ?>

                <a href="../../../index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <i class="bi bi-eco"></i>
                    </button>
                    <h1>CepisTours</h1>
                </a>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a href="../../../index.php" class="active">Inicio</a></li>

                        <li class="dropdown"><a href="#"><span>Busqueda por Regiones</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="../../caribe/caribe.php">El Caribe</a></li>
                                <li><a href="../../pacifico/pacifico.php">El Pacífico</a></li>
                                <li><a href="../../orinoquia/orinoquia.php">La Orinoquía</a></li>
                                <li><a href="../../amazonia/amazonia.php">La Amazonía</a></li>
                                <li><a href="../../andina/andina-insular.php">Las zonas Andina e Insular</a></li>
                            </ul>
                        </li>
                        <li><a href="publicaciones.php">Mis Publicaciones</a></li>
                        <li><a href="dashboard-empresa.php">Tablero</a></li>

                        <!-- .Perfil -->
                        <div class="dropdown"><a href="#"><span style="font-size:16px;cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false" class="d-block text-decoration-none dropdown-toggle"><?php echo $_SESSION['username'] ?> </span></a>
                            <li class="dropdown autenticado" style="margin-left: 45% ">
                                <ul>

                                    <li><a class="dropdown-item" href="views/dashboard/usuario.php">Perfil</a></li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="./loguot.php">Sign out</a></li>
                                </ul>
                        </div>
                        </li>


                    </ul>
                </nav>
                <div class="dropdown"></div>

                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Podrás conocer los lugares más <span>Sorprendentes de Colombia</span></h2>
                    <p>Aquí podrás encontrar lugares únicos, donde su gente y su ambiente son excepcionales.</p>
        
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main" data-aos="fade" data-aos-delay="1500">
        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container-fluid">
                <div class="row gy-4 justify-content-center">
                    <?php foreach ($resultado as $row) { ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <?php
                            $id = $row['id_imagen'];
                            $img = $row['img'];
                             
                            $nombre = $row['nombre_publicacion'];
                            $ruta = $row['ruta'];


                            ?>
                            <div class="gallery-item h-100">
                                <img src="data:image/png;base64,<?php echo base64_encode($row['img']) ?>" class="img-fluid" alt="">
                                <div class="gallery-links d-flex align-items-center justify-content-center">
                                    <a href="../dashboard/dashbo4rd/<?php echo $ruta; ?>" title="<?php echo $nombre; ?>" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                                    <a href="./views/detalles.php?id=<?php echo $row['id_imagen']; ?>&token=jesus" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                    <?php } ?>
                </div>
            </div>
        </section><!-- End Gallery Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <div class="container">
        <footer class="py-5 footer">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Mapa del sitio</h5>
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
                        <li class="nav-item mb-2"><a href="https://www.parquesnacionales.gov.co/portal/es/asi-ordenamos-el-ecoturismo-en-las-areas-protegidas/" class="nav-link p-0 text-muted">Parques Nacionales</a></li>
                        <li class="nav-item mb-2"><a href="http://www.minambiente.gov.co/" class="nav-link p-0 text-muted">Ministerio de Ambiente</a></li>
                        <li class="nav-item mb-2"><a href="http://www.altocomisionadoparalapaz.gov.co/Paginas/inicio.aspx" class="nav-link p-0 text-muted">Oficina de alto comisionario para la PAZ</a></li>
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
                        <p class="text-muted">Recibiras a tu correo notificaciones de Promociones y lugares que te dejaran fascinado.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Correo electronico</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Suscribete</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">
                <p class="copyright text-muted">&copy; 2022 CEPIS-Tours, Inc. Todos los derechos reservados.</p>
            </div>
        </footer>
        <!-- End Footer -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <div id="preloader">
            <div class="line"></div>
        </div>

    <?php } ?>

    <!-- Vendor JS Files -->
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../../assets/vendor/aos/aos.js"></script>
    <script src="../../../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../../assets/js/main.js"></script>

</body>

</html>