<!-- Authentication -->
<?php 

    class AuthController{

        // go to login page
        public function index(){
            include 'app/views/login.php';
        }

        // go to register page
        public function signupform(){
            include 'app/views/register.php';
        }

        // For Register account
        public function signup(){
            
        }
        // For Login account
        public function signin(){

        }
        //For Logout
        public function signout(){
            
        }
    }

?>