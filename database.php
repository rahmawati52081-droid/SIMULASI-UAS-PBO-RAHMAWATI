<?php
// koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_simulasi_pbo_ti1d_rahmawati";
    protected $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Menggunakan PDO untuk koneksi database
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database, 
                $this->username, 
                $this->password
            );
            // Mengatur error mode PDO ke Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>