<?php
    // $servername     = "172.17.0.1";
    // $username       = "root";
    // $password       = "12345";
    // $db_name        = "vgubusdb";

    // $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    // if ($conn->connect_error) {
    //     die("Connection failed" . $conn->connect_error);
    // }
    // echo "Connection successful";

    class DBConnect {
        private $host   = '172.17.0.1'; # find localhost ip address on your machine --> linux: ifconfig (docker0) // windows: ipconfig

        private $port = 3307;
        private $dbName = 'vgubusdb';
        private $user   = 'root';
        private $pass   = '12345';

        public function connect() {
            try {
                $conn = new PDO('mysql:host=' . $this->host . '; port=' . $this->port . '; dbname=' . $this->dbName, $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e) {
                echo 'Database Error: ' . $e->getMessage();
            }
        }
    }