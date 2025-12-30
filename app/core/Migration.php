<?php

namespace app\core;

/**
 * Base Migration Class
 * 
 * Provides common functionality for database migrations.
 * All migrations should extend this class.
 */
abstract class Migration
{
    /**
     * Database connection (shared singleton)
     */
    protected \PDO $db;

    /**
     * Constructor - Gets database connection
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Run the migration - must be implemented by child class
     */
    abstract public function up(): void;

    /**
     * Rollback the migration (optional)
     */
    public function down(): void
    {
        // Override in child class if needed
    }

    /**
     * Execute raw SQL
     */
    protected function execute(string $sql): bool
    {
        return $this->db->exec($sql) !== false;
    }

    /**
     * Create a table if it doesn't exist
     */
    protected function createTable(string $table, string $columns): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$table}` ({$columns})";
        return $this->execute($sql);
    }

    /**
     * Drop a table if it exists
     */
    protected function dropTable(string $table): bool
    {
        return $this->execute("DROP TABLE IF EXISTS `{$table}`");
    }

    /**
     * Check if table exists
     */
    protected function tableExists(string $table): bool
    {
        $stmt = $this->db->query("SHOW TABLES LIKE '{$table}'");
        return $stmt->rowCount() > 0;
    }

    /**
     * Ensure the database itself exists (for initial setup)
     */
    public static function ensureDatabase(): void
    {
        $pdo = Database::getServerConnection();
        $dbname = Database::getDatabaseName();
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbname}`");
    }
}
