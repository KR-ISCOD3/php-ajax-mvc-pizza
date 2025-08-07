<?php 

   class Database{
        static public function connection(){
            $conn = new mysqli('localhost','root','','php-pizza-ajax-project');
            return $conn;
        }

   } 
?>