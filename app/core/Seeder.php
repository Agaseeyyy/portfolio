<?php

namespace app\core;

/**
 * Base Seeder Class
 * 
 * Provides common functionality for database seeding.
 * All seeders should extend this class.
 */
abstract class Seeder
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
     * Run the seeder - must be implemented by child class
     */
    abstract public function run(): void;

    /**
     * Insert a single record into a table
     * 
     * @param string $table Table name
     * @param array $data Associative array of column => value
     * @return int Last insert ID
     */
    protected function insert(string $table, array $data): int
    {
        $columns = array_keys($data);
        $placeholders = array_fill(0, count($columns), '?');

        $sql = sprintf(
            "INSERT INTO `%s` (%s) VALUES (%s)",
            $table,
            implode(', ', $columns),
            implode(', ', $placeholders)
        );

        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_values($data));

        return (int) $this->db->lastInsertId();
    }

    /**
     * Insert multiple records into a table
     * 
     * @param string $table Table name
     * @param array $records Array of associative arrays
     * @return array Array of insert IDs
     */
    protected function insertBatch(string $table, array $records): array
    {
        $ids = [];
        foreach ($records as $record) {
            $ids[] = $this->insert($table, $record);
        }
        return $ids;
    }

    /**
     * Check if table is empty
     */
    protected function isTableEmpty(string $table): bool
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM `{$table}`");
        return (int) $stmt->fetchColumn() === 0;
    }

    /**
     * Get a single value from a table
     */
    protected function getValue(string $table, string $column, string $whereColumn, $whereValue)
    {
        $stmt = $this->db->prepare("SELECT `{$column}` FROM `{$table}` WHERE `{$whereColumn}` = ? LIMIT 1");
        $stmt->execute([$whereValue]);
        return $stmt->fetchColumn();
    }

    /**
     * Call another seeder
     */
    protected function call(string $seederClass): void
    {
        $seeder = new $seederClass();
        $seeder->run();
    }
}
