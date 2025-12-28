<?php
namespace app\core;

/**
 * Database Singleton Class
 * 
 * Provides a single shared PDO connection across the application.
 * Use Database::getInstance() to get the PDO connection.
 * 
 * Configuration is centralized here - change credentials in one place.
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
     * Database configuration - CHANGE THESE FOR YOUR ENVIRONMENT
     */
    private const HOST = 'localhost';
    private const DBNAME = 'bustarga_portfolio_web';
    private const USERNAME = 'root';
    private const PASSWORD = '';
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
    public static function getDbName(): string
    {
        return self::DBNAME;
    }

    /**
     * Create connection without database (for creating the database itself)
     * Used by migrations to ensure the database exists before connecting to it.
     * 
     * @return \PDO
     */
    public static function getServerConnection(): \PDO
    {
        $dsn = "mysql:host=" . self::HOST . ";charset=" . self::CHARSET;
        return new \PDO($dsn, self::USERNAME, self::PASSWORD, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
    }

    /**
     * Establish database connection
     */
    private function connect(): void
    {
        try {
            $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";charset=" . self::CHARSET;
            $this->pdo = new \PDO($dsn, self::USERNAME, self::PASSWORD, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (\PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }
}
