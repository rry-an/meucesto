<?php
/**
 * Padrão Singleton - Garante uma única instância de conexão com o banco
 */
final class Database {
    private static ?Database $instance = null;
    private PDO $pdo;

    private function __construct() {
        $host = getenv('DB_HOST') ?: 'localhost';
        $db   = getenv('DB_NAME') ?: 'mvc_feira_loja';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $opts);
    }

    private function __clone() {}
    public function __wakeup() { throw new Exception("Cannot unserialize singleton"); }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo(): PDO {
        return $this->pdo;
    }

    // Método para compatibilidade com código existente
    public static function pdo(): PDO {
        return self::getInstance()->getPdo();
    }
}
