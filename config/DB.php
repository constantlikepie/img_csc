<?php
    class DB{
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $name = 'csc';

        public function connect(){
            $connection_string = "mysql: host=$this->host; dbname=$this->name;";
            $connection = new PDO ($connection_string, $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        }
    }