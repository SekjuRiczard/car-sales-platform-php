<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";


        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Błąd połączenia: " . $e->getMessage());
        }
    }

    // Metoda zwracająca pojedynczą instancję (singleton)
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Zwraca obiekt PDO
    public function getConnection() {
        return $this->pdo;
    }
}
