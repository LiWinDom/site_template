<?php

class Model
{
    public $db;

    public function __construct()
    {
        // Creation a connection
        require_once "private_config.php";
        @header('Content-Type: text/html; charset=utf-8');

        try {
            $dsn = "mysql:host=" . _dbConnection["serverName"] . ";dbname=" . _dbConnection["dbName"] . ";charset=utf8";
            $this->db = new PDO($dsn, _dbConnection["username"], _dbConnection["password"], array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4; SET CHARACTER SET utf8mb4; SET SESSION collation_connection = utf8_general_ci;",
            ));
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @param $arr
     * @return string
     */
    public function arrayToVALUES($arr): string
    {
        $keys = array_keys($arr);
        return "(" . implode(", ", $keys) . ") VALUES (" . implode(", ", array_fill(0, count($keys), "?")) . ")";
    }

    /**
     * @param $arr
     * @return string
     */
    public function arrayToSET($arr): string
    {
        return implode(", ", array_map(fn($key) => "$key = ?", array_keys($arr)));
    }

    /**
     * @param $arr
     * @return string
     */
    public function arrayToWHERE($arr): string
    {
        if (empty($arr)) return "";
        return "WHERE " . implode(" AND ", array_map(fn($key) => "$key = ?", array_keys($arr)));
    }

    /**
     * @param $tableName
     * @param array $selector
     * @return void
     */
    public function getRowsNumber($tableName, array $selector = array()): int
    {
        $query = $this->db->prepare("SELECT count(*) FROM " . $tableName . $this->arrayToWHERE($selector));
        $query->execute(array_values($selector));
        return $query->fetchColumn();
    }
}