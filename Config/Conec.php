<?php
// Establecemos la conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'ecoturismo');

// Verificamos si hay un error en la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

?>