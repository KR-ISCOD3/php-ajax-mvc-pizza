<?php 

    require_once 'app/models/SignUp.php';

    class SignUpController{

        // navigate to login page
        public function index(){
            include 'app/views/register.php';
        }
        
        // singup function
        public function signup(){
            // session user is started when create account
            // session_start();

            // get data from frontent that use POST method
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $pass = $_POST['pass'] ?? '';

            // check if some name in input form is empty
            if(empty($name) || empty($email) || empty($pass)){
                echo json_encode([
                    'success'=>false,
                    'message'=>'Please fill in all fields'
                ]);
            }

            // convert password to many string 'adasd%Q#13...'
            $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
            // create an object to calling function create from model
            $signup = new SignUp();

            // call function create from model
            $rs = $signup->create($name,$email,$hashPassword);

            // check if success send user session to front
            if($rs){
                // Save user session
                $_SESSION['user'] = [
                    'username' => $name,
                    'email' => $email,
                ];

                // send success
                echo "success";
                exit;
            }
            // if not show message error
            else{
                echo 'Failed to create account';
            }
            
            
        }
        
    }
?>