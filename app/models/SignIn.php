<?php 

    require_once 'config/dbconnection.php';

    class SignIn{
        private $conn;

        public function __construct()
        {
            $this->conn = Database::connection();
        }

        public function loginUser($useroremail,$pass){
            // find user first by email or username
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = :useroremail OR email = :useroremail LIMIT 1');
            $stmt->execute(['useroremail' => $useroremail]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // verify with password and check account
            if($user && password_verify($pass,$user['password'])){
                return $user;
            }

            return false;
        }
    }

?>