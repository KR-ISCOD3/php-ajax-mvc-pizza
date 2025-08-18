<?php 
    require_once 'app/models/Size.php';
    class SizeController{
        
        public function index(){
            $obj = new Size();

            // send data to frontent
            $sizes = $obj->getAllData();

            $views = 'app/views/sizepage.php';
            include 'app/views/index.php';
        }

        public function create() {
            $sizeName = $_POST['size'] ?? "";
            $price = $_POST['price'] ?? "";

            if(empty($sizeName) || empty($price)){
                echo 'Please fill all form';
            }

            $sizeModel = new Size();
            $priceNumber = floatval($price);
            $rs = $sizeModel->create($sizeName, $priceNumber);


            if($rs){
                echo "Success";
            } else {
                echo "Failed";
            }

            exit; // stop any further HTML/template
        }



        public function update(){
            
        }

        public function destroy(){
            
        }
    }
?>