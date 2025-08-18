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

            foreach($sizes as $s){
                $id = $s['id'];
                $size = $s['size'];
                $price = $s['price'];

                echo <<<HTML
                        <tr class="align-middle">
                            <td>$id</td>
                            <td>$size</td>
                            <td>$$price</td>
                            <td>
                                <span class="bg-secondary-subtle text-secondary px-3 rounded-3">2025-07-31</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaleditsize">
                                    <i class="bi bi-vector-pen text-light"></i>
                                </button>

                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldeletesize">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                HTML;
            }
        }

        public function update(){
            
        }

        public function destroy(){
            
        }
    }
?>