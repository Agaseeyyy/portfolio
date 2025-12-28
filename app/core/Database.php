<?php
namespace app\core;

/**
 * Database Singleton Class
 * 
 * Provides a single shared PDO connection across the application.
 * Use Database::getInstance() to get the PDO connection.
 * 
 * Configuration is loaded from .env file via Config class.
 */
class Database
{
    /**
     * Singleton instance
     */
    private static ?Database $instance = null;

    /**
     * PDO connection instance
     */
    private ?\PDO $pdo = null;

    /**
     * Database configuration - loaded from .env
     */
    private static function getHost(): string { return Config::get('DB_HOST', 'localhost'); }
    private static function getDbName(): string { return Config::get('DB_NAME', 'sample_db'); }
    private static function getUsername(): string { return Config::get('DB_USER', 'root'); }
    private static function getPassword(): string { return Config::get('DB_PASS', ''); }
    private const CHARSET = 'utf8mb4';

    /**
     * Private constructor (singleton pattern)
     */
    private function __construct()
    {
        $this->connect();
    }

    /**
     * Prevent cloning (singleton pattern)
     */
    private function __clone() {}

    /**
     * Get the singleton PDO instance
     * 
     * @return \PDO The PDO database connection
     */
    public static function getInstance(): \PDO
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }

    /**
     * Get database name (for migrations)
     * 
     * @return string
     */
    public static function getDatabaseName(): string
    {
        return self::getDbName();
    }

    /**
     * Create connection without database (for creating the database itself)
     * Used by migrations to ensure the database exists before connecting to it.
     * 
     * @return \PDO
     */
    public static function getServerConnection(): \PDO
    {
        $dsn = "mysql:host=" . self::getHost() . ";charset=" . self::CHARSET;
        return new \PDO($dsn, self::getUsername(), self::getPassword(), [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
    }

    /**
     * Establish database connection
     */
    private function connect(): void
    {
        try {
            $dsn = "mysql:host=" . self::getHost() . ";dbname=" . self::getDbName() . ";charset=" . self::CHARSET;
            $this->pdo = new \PDO($dsn, self::getUsername(), self::getPassword(), [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (\PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }
}

