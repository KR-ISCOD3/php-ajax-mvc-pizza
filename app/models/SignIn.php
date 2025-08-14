<?php 

    require_once 'config/dbconnection.php';

    class SignIn{
        private $conn;

        public function __construct()
        {
            $this->conn = Database::connection();
        }

        public function loginUser($useroremail, $pass) {
            // find user by email and name
            $stmt = $this->conn->prepare(
                'SELECT * FROM users WHERE name = ? OR email = ? LIMIT 1'
            );
            $stmt->bind_param("ss", $useroremail, $useroremail);
            $stmt->execute();
            // get user
            $result = $stmt->get_result();
            // get user as associative array
            $user = $result->fetch_assoc();

            // verify with password
            if ($user && password_verify($pass, $user['password'])) {
                return $user;
            }
            
            return false;
        }

    }

?>