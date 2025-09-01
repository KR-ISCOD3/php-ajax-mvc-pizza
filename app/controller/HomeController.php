<?php 

    require_once 'app/models/Item.php';

    class HomeController{
        public function index(){
            
            $views = 'app/views/homepage.php';
            include 'app/views/index.php';
        }

        public function getSize(){
            $obj = new Size();

            // send data to frontent
            $sizes = $obj->getAllData();

            foreach($sizes as $s){

                $id = $s['id'];
                $size = $s['size'];
                $price = number_format($s['price'], 2); 

                echo <<<HTML
                     <option data-id="$id" data-price="$price" value="$size">$size</option>
                HTML;
                
               
            }
            
        }

        public function getItem(){

            $user_id = $_POST['userid'] ?? "";
            $itemModel = new Item();
            $items = $itemModel->getAllData($user_id);

            foreach($items as $i){
                $id = $i['id'];
                $name = $i['name'];
                $image = $i['image'];  // stored filename like "1692952384_pizza.png"
                // $username = $i['username'];

                echo <<<HTML
                    <tr class="align-middle">
                        <td class="text-center">$id</td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="app/assets/uploads/$image" class="object-fit-cover" alt="" style="width: 50px;height: 50px;">
                                    <h5 class="m-0 ms-1">$name</h5>
                                </div>
                                <div>
                                    <button data-id="$id" data-name="$name" class="btn btn-success btn-order">
                                        + Add to Cart 
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>   
                HTML;
            }  

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