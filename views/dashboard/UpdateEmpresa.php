<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobar que se han enviado todos los campos necesarios
    $email = $_POST['email'];
    $password_input = $_POST['password'];
    $username_input = $_POST['username'];
    $tlf = $_POST['tlf'];
    $id_usuario = $_SESSION['id'];

    $passwordHash = password_hash($password_input, PASSWORD_BCRYPT);

    // Conectar a la base de datos
    $dsn = 'mysql:host=localhost;dbname=ecoturismo';
    $username = 'root';
    $password = '';
    $pdo = new PDO($dsn, $username, $password);

    // Iniciar una transacción
    $pdo->beginTransaction();

    try {

        // Definimos la secuencia SQL como una cadena
        $sql = "UPDATE empresa SET correo = :email, passwd = :password, username = :username, num_telefonico = :tlf WHERE id_empresa = :id_usuario";

        // Preparamos la secuencia SQL para su ejecución
        $stmt = $pdo->prepare($sql);

        // Asignamos los valores de las variables PHP a los parámetros de la sentencia preparada
        $stmt->bindparam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':username', $username_input);
        $stmt->bindParam(':tlf', $tlf);
        $stmt->bindParam(':id_usuario', $id_usuario);

        // Ejecutamos la sentencia preparada
        if ($stmt->execute()) {

            $pdo->commit();
            header('Location: ./usuario.php');
            exit();
        } else {
            // La consulta no se ejecutó correctamente, manejar el error aquí
            echo "Error al actualizar los datos: " . $stmt->errorInfo();
        }
    } catch (PDOException $e) {
        // Si hay algún error, cancelar la transacción y mostrar un mensaje de error
        $pdo->rollBack();
        echo 'Ha ocurrido un error al guardar la publicación: ' . $e->getMessage();
    }
}
