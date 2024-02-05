<?php

class Db {
    private static $instance = null;
    private $connection;

    public function __construct() {
        if (!file_exists(__DIR__ . '/../../.env')) {
            throw new \Exception('El archivo .env no existe');
        }

        $env = file(__DIR__ . '/../../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($env as $line) {
            list($name, $value) = explode('=', $line, 2);
            $_ENV[$name] = $value;
        }

        $host = $_ENV['DB_HOST'];
        $db   = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function executeQuery($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function __clone() {
        // Evitar la clonación del objeto
        throw new \Exception("Clonación no permitida.");
    }

    public function __wakeup() {
        // Evitar la deserialización del objeto
        throw new \Exception("Deserialización no permitida.");
    }
}