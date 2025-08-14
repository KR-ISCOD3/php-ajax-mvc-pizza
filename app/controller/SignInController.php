<?php 

    require_once 'app/models/SignIn.php';

    class SignInController{

        // navigate to login page
        public function index(){
            include 'app/views/login.php';
        }
        
        public function login(){
            // session_start();
            
            $nameoremail = $_POST['nameoremail'] ?? "";
            $pass = $_POST['pass'] ?? "";

            if(empty($nameoremail) || empty($pass)){
                echo 'Please fill the form';
            }

            // $hashPassword = password_hash($pass,PASSWORD_DEFAULT);

            $login = new SignIn();

            $user = $login->loginUser($nameoremail, $pass);

           // check if success send user session to front
            if( $user){
                // Save user session
                $_SESSION['user'] = [
                    'user_id' =>  $user['id'],
                    'username' => $user['name'],
                    'email' => $user['email'],
                ];

                // send success
                echo "success";
                exit;
            }
            // if not show message error
            else{
                echo 'Invalid username/email or password';
                exit;
            }
        }
    }   

?>