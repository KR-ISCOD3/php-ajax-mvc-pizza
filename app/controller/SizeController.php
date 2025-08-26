<?php 
    require_once 'app/models/Size.php';
    class SizeController{

        public function index(){
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

        public function getAllData(){
            $obj = new Size();

            // send data to frontent
            $sizes = $obj->getAllData();

            $count = 0;

            foreach($sizes as $s){
                $count++;
                $id = $s['id'];
                $size = $s['size'];
                $price = number_format($s['price'], 2); 

                echo <<<HTML
                        <tr class="align-middle">
                            <td>$count</td>
                            <td>$size</td>
                            <td class="text-danger">$$price</td>
                            <td>
                                <span class="bg-secondary-subtle text-secondary px-3 rounded-3">2025-07-31</span>
                            </td>
                            <td class="text-center">
                                <button  

                                    data-id="$id" 
                                    data-size="$size" 
                                    data-price="$price"

                                    class="btn btn-warning btn-edit" 
                                    data-bs-toggle="modal" data-bs-target="#modaleditsize">
                                    <i class="bi bi-vector-pen text-light"></i>
                                </button>

                                <button data-id="$id"  class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#modaldeletesize">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                HTML;
                
               
            }
            
        }

        public function update() {
            
            $id = $_POST['id'] ?? "";
            $sizeName = $_POST['size'] ?? "";
            $price = $_POST['price'] ?? "";

            if(empty($sizeName) || empty($price)){
                echo 'Please fill all form';
            }

            $sizeModel = new Size();
            $priceNumber = floatval($price);
            $rs = $sizeModel->update($id,$sizeName, $priceNumber);


            if($rs){
                echo "Success";
            } else {
                echo "Failed";
            }

            exit; // stop any further HTML/template
        }

        public function destroy(){
            $id = $_POST["id"] ?? "";

            if(empty($id)){
                echo 'Invalid sth';
            }

            $sizeModel = new Size();
            $rs = $sizeModel->delete($id);

            if($rs){
                echo 'success';
            }else{
                echo 'Error Deleted';
            }
        }
    }
?>