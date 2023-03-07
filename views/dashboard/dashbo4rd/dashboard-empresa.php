    <!Doctype HTML>
    <html>

    <head>
        <title>Tablero</title>
        <link rel="stylesheet" href="../css/dashboard.css" type="text/css" />
        <link rel="stylesheet" href="../css/aos/aos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <?php session_start(); ?>
        <?php if (isset($_SESSION['id']) && $_SESSION['tipo_usuario'] == 'Empresa')  { ?>

        <!--===========Sidenav================-->

        <div id="mySidenav" class="sidenav">
            <p class="logo"><span>Ce</span>pis-Tours</p>
            <a class="icon-a" href="../../../index.php" id="main-link"><i class="fa fa-home icons" aria-hidden="true"></i> &nbsp;&nbsp;Inicio</a>
            <a class="icon-a" href="publicaciones.php" id="mispromociones-link"><i class="fa fa-files-o icons" aria-hidden="true"></i> &nbsp;&nbsp;Publicaciones</a>
            <a class="icon-a" href="../usuario.php" id="mensajes-link"><i class="fa fa-user icons" aria-hidden="true"></i> &nbsp;&nbsp;Mi Perfil</a>
            <a class="icon-a" href="upload.php" id="miCuenta-link"><i class="fa fa-plus icons" aria-hidden="true"></i> &nbsp;&nbsp;Crear Publicaciones</a>
        </div>

        <!-- =========== Main ================-->
        <div id="main" class="content">
            <div class="head">
                <div class="col-div-6">
                    <span style="font-size:30px;cursor:pointer; color: white;" class="nav">&#9776; Inicio</span>

                    <span style="font-size:30px;cursor:pointer; color: white;" class="nav2">&#9776; Inicio</span>
                </div>
                <div class="col-div-6">
                    <div class="profile">
                        <div class="dropdown text-end">
                            <span style="font-size:21px;cursor:pointer; color: white;" data-bs-toggle="dropdown" aria-expanded="false" class="d-block text-decoration-none dropdown-toggle"><?php echo $_SESSION['username'] ?></span>
                            <ul class="dropdown-menu text-small">

                                <li><a class="dropdown-item" href="./loguot.php">Salir</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <br />

            <div class="clearfix"></div>
            <br /><br />
            <div class="col-div-8">
                <div class="box-8">
                    <div class="content-box">
                        <p>Publicaciones mas vistas <span>2023</span></p>
                        <br />
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-div-4">
                <div class="box-4">
                    <div class="content-box">
                        <p>Historial de Servicios</p>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/spin-loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../css/aos/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--Conteo interactivo de numeros-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.getElementsByClassName("count");
            let counts = Array.from({
                length: elements.length
            }, () => 0);
            let activeIntervals = elements.length;
            for (let i = 0; i < elements.length; i++) {
                let intervalId = setInterval(function() {
                    if (counts[i] < parseInt(elements[i].getAttribute("data-count"))) {
                        counts[i]++;
                        elements[i].innerHTML = counts[i];
                    } else {
                        clearInterval(intervalId);
                        activeIntervals--;
                        if (activeIntervals === 0) {
                            clearAllIntervals();
                        }
                    }
                }, 3);
            }

            function clearAllIntervals() {
                let id = setInterval(() => {}, 99999);
                while (id--) {
                    clearInterval(id);
                }
            }
        });
    </script>
    <!--reducir el sidebar-->
    <script>
        //main
        $(".nav").click(function() {
            $("#mySidenav").css('width', '70px');
            $("#main").css('margin-left', '70px');
            $(".logo").css('visibility', 'hidden');
            $(".logo span").css('visibility', 'visible');
            $(".logo span").css('margin-left', '4px');
            $(".icon-a").css('visibility', 'hidden');
            $(".icons").css('visibility', 'visible');
            $(".icons").css('margin-left', '-8px');
            $(".nav").css('display', 'none');
            $(".nav2").css('display', 'block');
        });
        $(".nav2").click(function() {
            $("#mySidenav").css('width', '300px');
            $("#main").css('margin-left', '300px');
            $(".logo").css('visibility', 'visible');
            $(".icon-a").css('visibility', 'visible');
            $(".icons").css('visibility', 'visible');
            $(".nav").css('display', 'block');
            $(".nav2").css('display', 'none');
        });
    </script>
    <!--Graficas interactiva-- Despues ver que colocar aqui-->
    <script>
        //Servicios concretados por mes
        var labels = ['Concretados', 'No concretados'];
        var data = [70, 100];
        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'No Concretados',
                    data: data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                    ],
                    borderColor: 'rgba(125, 3, 13, 1)',
                    borderJoinStyle: 'round',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        //Publicaciones realizada por el usuario
        var labels = ['Publicación 1', 'Publicación 2', 'Publicación 3'];
        var data = [150, 115, 200];
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Número de visitas',
                    data: data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ],
                    borderColor: 'rgba(125, 3, 13, 1)',
                    borderJoinStyle: 'round',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        window.addEvenwtListener('loasd', () => {
            const Loader = document.querySelector(".Loasder")
            Loader.style.opacity = 1
            Loader.style.visibility = 'hiddsen'
            Loader.style.display = ''
        });
        //
    </script>
    <!--Agregar a los link que se le haga click del sidebar la clase active y mostrar el contenido de cada uno respectivamente -->

    </script>

    </body>


    </html>