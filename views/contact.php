<!DOCTYPE html>
<html lang="en">

<head>
  <?php session_start() ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ecoturismo y áreas protegidas - Contacto para contrataciones</title>
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
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="../index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <i class="bi bi-eco"></i>
        </button>
        <h1>CepisTours</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../index.php">Inicio</a></li>
          <li class="dropdown"><a href="#"><span>Busqueda por Regiones</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="./caribe/caribe.php">El Caribe</a></li>
              <li><a href="./pacifico/pacifico.php">El Pacífico</a></li>
              <li><a href="./orinoquia/orinoquia.php">La Orinoquía</a></li>
              <li><a href="./amazonia/amazonia.php">La Amazonía</a></li>
              <li><a href="./andina/andina-insular.php">Las zonas Andina e Insular</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['id'])) { ?>
            <li><a href="./views/recientes.php">Publicaciones más recientes</a></li>
          <?php } ?>
          <?php if (!isset($_SESSION['id'])) { ?>
            <li><a href="./contact.php">Cuenta para Empresa</a></li>
            <li><a href="./about.php">Acerca de</a></li>
            <!-- .Ingresar -->
            <li class="dropdown Ingresar"><a href="#"><span>Ingresar</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="./views/IngresoBusiness/" target="_blank">Como Empresa</a></li>
                <li><a href="./views/IngresoTurista/" target="_blank">Como Turista</a></li>

              </ul>
            </li>
            <!-- .Registro -->
            <li class="dropdown Registro"><a href="#"><span>Registro</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="./views/IngresoTurista/signup.php" target="_blank">Como Turista</a></li>

              </ul>
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
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Trabaja con nosotros.</h2>
            <h3>Impulsamos tu negocio a otro nivel</h3>
            <br>
            <p>
              Por medio de este formulario podrás solicitar la creación de tu cuenta como empresa,
              para poder ofrecer tus servicios a todos los turistas del mundo que deseen
              conocer y estar con la naturaleza.</p>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Localización:</h4>
                <p>Calle 100 av 12-12, Bogotá Colombia</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>info@cepistours.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Telefono:</h4>
                <p>+57 305 9548855</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row justify-content-center mt-4">

          <div class="col-lg-9">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombres" required><br>
                </div>
                <div class="col-md-6 form-group mt-3">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Apellidos" required><br>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo electronico" required><br>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="tlf" id="tlf" placeholder="Numero de teléfono" required><br>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required><br>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="mensaje" rows="5" placeholder="Mensaje" required></textarea><br>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
              </div>
              <div class="text-center"><button type="submit">Enviar Solicitud</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <br><br>
  <!-- ======= Footer ======= -->

  <div class="container">
    <footer class="py-5 footer">
      <div class="row">
        <div class="col-6 col-md-2 mb-3">
          <h5>Section</h5>
          <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Inicio</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Caracteristicas</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Precios</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Preguntas Frecuentes</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Acerca de</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Entidades</h5>
          <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Inicio</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Caracteristicas</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Precios</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Preguntas Frecuentes</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Acerca de</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Ministerios</h5>
          <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Inicio</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Caracteristicas</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Precios</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Preguntas Frecuentes</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Acerca de</a></li>
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
        <p class="copyright text-muted">&copy; 2022 CEPIS-Ecotours, Inc. Todos los derechos reservados.</p>
      </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader">
      <div class="line"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template../ Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>