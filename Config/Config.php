<?php

class Database
{
    private $user = "root";
    private $pass = "";
    public function conectar()
    {
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO('mysql:host=localhost;dbname=ecoturismo', $this->user, $this->pass, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexion: ' . $e->getMessage();
            exit;
        }
    }
}
