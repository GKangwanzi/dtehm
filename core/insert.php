<?php
class Database {
    private $connection; 
    
    public function __construct($host, $username, $password, $dbname) {
        $this->connection = new mysqli($host, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function insert($tableName, $data) {
        if (empty($tableName) || empty($data) || !is_array($data)) {
            throw new InvalidArgumentException("Invalid table name or data provided.");
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO `$tableName` ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Error preparing the statement: " . $this->connection->error);
        }

        $types = str_repeat("s", count($data));
        $stmt->bind_param($types, ...array_values($data));

        if (!$stmt->execute()) {
            throw new Exception("Error executing the statement: " . $stmt->error);
        }

        return $this->connection->insert_id;
    }

    public function close() {
        $this->connection->close();
    }
}