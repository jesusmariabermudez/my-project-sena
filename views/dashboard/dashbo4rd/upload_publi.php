<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobar que se han enviado todos los campos necesarios
    if (isset($_POST['name'], $_POST['region'], $_POST['latitude'], $_POST['longitude'], $_POST['description']) && !empty($_FILES['image'])) {
        $name = $_POST['name'];
        $region = $_POST['region'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $description = $_POST['description'];
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $id_usuario = $_SESSION['id'];


        // Conectar a la base de datos
        $dsn = 'mysql:host=localhost;dbname=ecoturismo';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password);

        // Iniciar una transacción
        $pdo->beginTransaction();

        try {

            // Guardar la imagen en una carpeta
            $uploadDir = 'images/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            // Capturan los datos de la imagen
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
            $ruta = $uploadDir . $_FILES['image']['name'];

            // Guardar la imagen en la base de datos
            $stmt = $pdo->prepare('INSERT INTO image (nombre_archivo, tipo_archivo, tamaño_archivo, ruta, img) VALUES (?, ?, ?, ?, ?)');
            $stmt->bindParam(1, $_FILES['image']['name']);
            $stmt->bindParam(2, $_FILES['image']['type']);
            $stmt->bindParam(3, $_FILES['image']['size']);
            $stmt->bindParam(4, $ruta);
            $stmt->bindParam(5, $image, PDO::PARAM_LOB);
            $stmt->execute();

            $id_imagen = $pdo->lastInsertId();

            // Obtener la fecha y hora actual
            $currentDate = date("Y-m-d H:i:s");

            // Guardar la publicación
            $stmt = $pdo->prepare('INSERT INTO publicaciones (nombre_publicacion, texto, latitud, longitud, id_usuario, id_region, id_imagen, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $latitude);
            $stmt->bindParam(4, $longitude);
            $stmt->bindParam(5, $id_usuario);
            $stmt->bindParam(6, $region);
            $stmt->bindParam(7, $id_imagen);
            $stmt->bindParam(8, $currentDate);
            $stmt->execute();


            // Confirmar la transacción
            $pdo->commit();

            // Mostrar un mensaje de éxito
            header('Location: upload.php');
        } catch (PDOException $e) {
            // Si hay algún error, cancelar la transacción y mostrar un mensaje de error
            $pdo->rollBack();
            echo 'Ha ocurrido un error al guardar la publicación: ' . $e->getMessage();
        }
    } else {
        // Mostrar un mensaje de error si faltan campos
        echo 'Por favor, rellena todos los campos.';
    }
}
