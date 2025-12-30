<?php

namespace app\core;

/**
 * Base Model Class
 * 
 * Provides model functionality for vanilla PHP.
 * All models should extend this class and define their own
 * $table, $primaryKey, and $allowedFields properties.
 */
abstract class Model
{
    /**
     * Database connection instance (shared singleton)
     */
    protected \PDO $db;

    /**
     * Table name for this model
     */
    protected string $table = '';

    /**
     * Primary key field name
     */
    protected string $primaryKey = 'id';

    /**
     * Fields that are allowed to be inserted/updated
     */
    protected array $allowedFields = [];

    /**
     * Return type: 'array' or 'object'
     */
    protected string $returnType = 'array';

    /**
     * Whether to use timestamps
     */
    protected bool $useTimestamps = true;

    /**
     * Created at field name
     */
    protected string $createdField = 'created_at';

    /**
     * Updated at field name
     */
    protected string $updatedField = 'updated_at';

    /**
     * WHERE conditions for queries
     */
    protected array $whereConditions = [];

    /**
     * ORDER BY clause
     */
    protected ?string $orderBy = null;

    /**
     * LIMIT clause
     */
    protected ?int $limit = null;

    /**
     * Constructor - Gets shared database connection from singleton
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Get the PDO connection instance
     */
    public function getConnection(): \PDO
    {
        return $this->db;
    }

    /**
     * Reset query builder state
     */
    protected function resetQuery(): void
    {
        $this->whereConditions = [];
        $this->orderBy = null;
        $this->limit = null;
    }

    /**
     * Find all records, optionally with conditions
     * 
     * @return array
     */
    public function all(): array
    {
        $sql = "SELECT * FROM {$this->table}";
        $params = [];

        // Apply WHERE conditions
        if (!empty($this->whereConditions)) {
            $whereClauses = [];
            foreach ($this->whereConditions as $condition) {
                $whereClauses[] = "{$condition['field']} {$condition['operator']} ?";
                $params[] = $condition['value'];
            }
            $sql .= " WHERE " . implode(' AND ', $whereClauses);
        }

        // Apply ORDER BY
        if ($this->orderBy) {
            $sql .= " ORDER BY {$this->orderBy}";
        }

        // Apply LIMIT
        if ($this->limit) {
            $sql .= " LIMIT {$this->limit}";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        $this->resetQuery();

        return $stmt->fetchAll();
    }

    /**
     * Find a single record by primary key
     * 
     * @param int|string $id
     * @return array|null
     */
    public function find($id): ?array
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result ?: null;
    }

    /**
     * Get the first record matching conditions
     * 
     * @return array|null
     */
    public function first(): ?array
    {
        $this->limit = 1;
        $results = $this->all();
        return $results[0] ?? null;
    }

    /**
     * Add WHERE condition
     * 
     * @param string $field
     * @param mixed $value
     * @param string $operator
     * @return self
     */
    public function where(string $field, $value, string $operator = '='): self
    {
        $this->whereConditions[] = [
            'field' => $field,
            'value' => $value,
            'operator' => $operator,
        ];
        return $this;
    }

    /**
     * Add ORDER BY clause
     * 
     * @param string $field
     * @param string $direction
     * @return self
     */
    public function orderBy(string $field, string $direction = 'ASC'): self
    {
        $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';
        $this->orderBy = "{$field} {$direction}";
        return $this;
    }

    /**
     * Add LIMIT clause
     * 
     * @param int $limit
     * @return self
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Insert a new record
     * 
     * @param array $data
     * @return int|false Last insert ID or false on failure
     */
    public function insert(array $data)
    {
        // Filter to allowed fields only
        $data = $this->filterAllowedFields($data);

        // Add timestamps if enabled
        if ($this->useTimestamps && $this->createdField) {
            $data[$this->createdField] = date('Y-m-d H:i:s');
        }
        if ($this->useTimestamps && $this->updatedField) {
            $data[$this->updatedField] = date('Y-m-d H:i:s');
        }

        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";

        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute(array_values($data));

        return $success ? (int) $this->db->lastInsertId() : false;
    }

    /**
     * Update a record by primary key
     * 
     * @param int|string $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data): bool
    {
        // Filter to allowed fields only
        $data = $this->filterAllowedFields($data);

        // Add updated timestamp if enabled
        if ($this->useTimestamps && $this->updatedField) {
            $data[$this->updatedField] = date('Y-m-d H:i:s');
        }

        $setClauses = [];
        $params = [];
        foreach ($data as $field => $value) {
            $setClauses[] = "{$field} = ?";
            $params[] = $value;
        }
        $params[] = $id;

        $sql = "UPDATE {$this->table} SET " . implode(', ', $setClauses) . " WHERE {$this->primaryKey} = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Save data - inserts or updates based on primary key presence
     * 
     * @param array $data
     * @return int|bool Insert ID on insert, true on update, false on failure
     */
    public function save(array $data)
    {
        if (isset($data[$this->primaryKey]) && !empty($data[$this->primaryKey])) {
            $id = $data[$this->primaryKey];
            unset($data[$this->primaryKey]);
            return $this->update($id, $data) ? true : false;
        }
        return $this->insert($data);
    }

    /**
     * Delete a record by primary key
     * 
     * @param int|string $id
     * @return bool
     */
    public function delete($id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    /**
     * Count all records matching conditions
     * 
     * @return int
     */
    public function countAll(): int
    {
        $sql = "SELECT COUNT(*) as count FROM {$this->table}";
        $params = [];

        if (!empty($this->whereConditions)) {
            $whereClauses = [];
            foreach ($this->whereConditions as $condition) {
                $whereClauses[] = "{$condition['field']} {$condition['operator']} ?";
                $params[] = $condition['value'];
            }
            $sql .= " WHERE " . implode(' AND ', $whereClauses);
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        $this->resetQuery();

        $result = $stmt->fetch();
        return (int) $result['count'];
    }

    /**
     * Execute a raw SQL query
     * 
     * @param string $sql
     * @param array $params
     * @return array
     */
    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Filter data to only include allowed fields
     * 
     * @param array $data
     * @return array
     */
    protected function filterAllowedFields(array $data): array
    {
        if (empty($this->allowedFields)) {
            return $data;
        }

        return array_filter($data, function ($key) {
            return in_array($key, $this->allowedFields);
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Get table name
     * 
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Get primary key name
     * 
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
}
