<?php

namespace App\Models;

use PDO;

require_once dirname(__DIR__). '/config/database.php'; // Include the config file

class User {
    //...
    private $db;

    public function __construct()
    {
        // Configura la conexión a la base de datos
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function hashPassword($password)
    {
        // Hashea la contraseña con bcrypt
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $hashedPassword;
    }
}