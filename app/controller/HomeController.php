<?php 

    class HomeController{
        public function index(){
            
            $views = 'app/views/homepage.php';
            include 'app/views/index.php';
        }

        public function create(){

        }

        public function update(){
            
        }

        public function destroy(){
            
        }

        public function logout(){
            session_unset();
            session_destroy();

            echo 'Logout Success';
        }
    }
?>