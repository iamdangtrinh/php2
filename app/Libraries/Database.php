<?php
// namespace App\Libraries;
// use PDO;
// use PDOException;

class Database
{
    protected $conn;

    public function __construct()
    {
    }

    public function __destruct()
    {
        unset($this->conn);
    }

    public function pdo_get_connection()
    {
        $host = DBHOST;
        $dburl = "mysql:host=$host;dbname=" . DBNAME . ";charset=utf8";
        $username = DBUSER;
        $password = '';
        $this->conn = new PDO($dburl, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }

    public function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }

    public function pdo_query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }

    public function pdo_query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }

    public function pdo_query_value($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }
}
