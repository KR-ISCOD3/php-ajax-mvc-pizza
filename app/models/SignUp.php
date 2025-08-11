<?php 

    require_once 'config/dbconnection.php';

    // Model for signup
    class SignUp{

        // create data member for call connection
        private $conn;

        // calling database connection from dbconnection.php
        public function __construct()
        {
            $this->conn = Database::connection();
        }

        // function create account
        public function create($username, $email, $password){
            $stmt = $this->conn->prepare('INSERT INTO `users`( `name`, `email`, `password`) VALUES (?,?,?)');
            $stmt->bind_param("sss",$username, $email, $password);
            $result = $stmt->execute();

            $stmt->close();
            return $result;
        }
    }



?>