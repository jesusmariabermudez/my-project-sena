<!DOCTYPE html>
<html lang="es">

<head>
    <?php session_start() ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Crear Publicaciones</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Vendor CSS  -->
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!--  Main CSS -->
    <link href="../../../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body onload="getLocation()" class="container">
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">
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
                                <li><a href="../../andina/andina.php">Las zonas Andina e Insular</a></li>
                            </ul>
                        </li>
                        <li><a href="../../recientes.php">Publicaciones más recientes</a></li>
                        <li><a href="dashboard-empresa.php">Tablero</a></li>
                        <?php if (!isset($_SESSION['id'])) { ?>
                            <li><a href="./views/contact.php">Cuenta para Empresa</a></li>
                            <li><a href="./views/about.php">Acerca de</a></li>
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
                        <?php if (isset($_SESSION['id'])) { ?>
                            <!-- .Perfil -->
                            <li class="dropdown autenticado" style="margin-left: 45% ">
                                <div class="dropdown"><a href="#"><span style="font-size:16px;cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false" class="d-block text-decoration-none dropdown-toggle"><?php echo $_SESSION['username'] ?> </span></a>
                                    <ul>

                                        <li><a class="dropdown-item" href="../usuario.php">Perfil</a></li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="./loguot.php">Salir</a></li>
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

    <section class="cargar" id="cargar">
        <form class="myForm" id="myForm" action="upload_publi.php" method="post" enctype="multipart/form-data">
            <div class="banner">
                <img id="preview" src="" alt="Preview">
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage()">
            </div>
            <div class="info">
                <div class="name">
                    <label for="name">Nombre del sitio:</label>
                    <input type="text" id="name" name="name">
                    <label for="region">Región:</label>
                    <select id="region" name="region" class="form-select mb-3" aria-label="Default select example">
                        <option selected disabled>---Región---</option>
                        <?php
                        //conexión a la base de datos
                        $conn = new mysqli("localhost", "root", "", "ecoturismo");

                        //comprobar conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        $sql = $conn->query("SELECT * FROM regiones");
                        while ($resultado = $sql->fetch_assoc()) {
                            echo "<option value='" . $resultado['id_region'] . "'> " . $resultado['nombre_region'] . "</option> ";
                        }
                        ?>
                    </select>
                    <input type="hidden" id="latitude" name="latitude" required value="">
                    <input type="hidden" id="longitude" name="longitude" required value="">
                    <label for="description">Descripción:</label>
                    <div class="options">
                        <select id="font-size" name="font-size" onchange="changeFontSize()">
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="24">24</option>
                            <option value="26">26</option>
                            <option value="28">28</option>
                            <option value="32">32</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                        </select>
                        <select id="font-family" name="font-family" onchange="changeFontFamily()">
                            <option value="Courier">Courier</option>
                            <option value="Arial">Arial</option>
                            <option value="Arial Black">Arial Black</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Times New Roman">Times New Roman</option>
                        </select>
                        <select id="color-select" name="color-select" onchange="changeColor()">
                            <option value="#ffffff">Blanco</option>
                            <option value="#000000">Negro</option>
                            <option value="#ff0000">Rojo</option>
                            <option value="#00ff00">Verde</option>
                            <option value="#0000ff">Azul</option>
                        </select>
                    </div><br>
                    <textarea class="form-control" wrap="hard" style="white-space: pre-wrap;" id="description" name="description" cols="100" rows="10" onKeyUp="maximo(this,4800);" onKeyDown="maximo(this,4800);"></textarea>
                </div>
                <br>
                <button id="boton" class="btn btn-outline-info" type="button" onclick="previewPost()">Previsualizar</button>
                <input id="boton-input" class="btn btn-outline-danger" type="submit" value="Publicar">
            </div>

        </form>
    </section>

    <!-- Modal para previsualizar la publicación -->
    <div id="preview-modal" style="display:none">
        <br><br><br>
        <hr>
        <button type="button" onclick="closeModal()">Cerrar</button>

        <div class="preview-content">
            <div class="image-container">
                <h1 style="font-weight: 600;color: rgb(240, 236, 236);text-shadow: 3px 2px 2px rgb(38, 40, 41);" id="preview-name"></h1>
                <p style="font-weight: 600;color: rgb(201, 197, 197);text-shadow: 3px 2px 2px rgb(38, 40, 41);" id="preview-direccion"></p>
                <img class="" id="preview-image" src="" alt="Preview">
            </div>

            <div class="preview-info">
                <hr>
                <pre id="preview-description"></pre>
                <hr>
            </div>
        </div>
        <p id="preview-coordinates" style="display:none"></p>
        <h1 style="font-weight: 600;color: rgb(201, 197, 197);text-shadow: 3px 2px 2px rgb(38, 40, 41);">Ubicación en el mapa</h1>
        <div id="map"></div>
        <button type="button" onclick="closeModal()">Cerrar</button>
    </div>

<?php } ?>
<!-- Vendor JS Files -->
<script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../../assets/vendor/aos/aos.js"></script>
<script src="../../../assets/vendor/php-email-form/validate.js"></script>

<script src="../js/main.js"></script>
<script>
    $('#description').summernote({
        placeholder: 'Escribe algo...',
        tabsize: 2,
        height: 100
    });
</script>
</body>

</html>