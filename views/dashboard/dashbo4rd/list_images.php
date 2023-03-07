<!-- archivo para listar imágenes -->
<!DOCTYPE html>
<html>

<head>
    <title>Listar imágenes</title>
</head>

<body>
    <h1>Listar imágenes</h1>
    <?php
    //conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "ecoturismo");

    //comprobar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $user_id = $_SESSION['id'];

    //consulta para seleccionar todas las imágenes del usuario
    $sql = "SELECT * FROM image WHERE 1";
    $result = $conn->query($sql);

    session_start();
    if (!isset($_SESSION['id'])) {
        Header("Location: ../../../index.html");
    }

    if ($result->num_rows > 0) {

        //output de cada fila
        while ($row = $result->fetch_assoc()) {

            echo '<img src="' .$row['ruta']. '" alt="">';
            echo "Nombre: " .$row["nombre"]. " - Descripción: " .$row["idimage"]. "<br>";
        }
    } else {
        echo "Este usuario no tiene imágenes";
        echo $_SESSION['id'];
    }

    //cierre de conexión
    $conn->close();
    ?>
    <br>
    <a href="upload_image.php">Subir imágenes</a>
</body>

</html>