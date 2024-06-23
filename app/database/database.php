<?php
    final class Database
    {
        public $pdo;
        private $host = 'localhost';
        private $db = 'db_pawnshop';
        private $user = 'postgres';
        private $password = 'Aa123456';

        function __construct()
        {
            $dsn = "pgsql:host=$this->host;port=5432;dbname=$this->db;";
            $this->pdo = new PDO($dsn, $this->user, $this->password, 
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            if ($this->pdo) 
            {
                $messageDB = "Connected to the $this->db database successfully!";
                echo "<script>console.log('{$messageDB}');</script>";
            }
        }
    }