<?php 

    require_once 'app/models/Item.php';
    class ItemController{
        public function index(){
            
            $views = 'app/views/itempage.php';
            include 'app/views/index.php';
        }

        public function create(){
            
            $user_id = $_POST['user_id'] ?? "";
            $name = $_POST['name'] ?? "";
            $image = $_FILES['image'] ?? "";

            // move upload file
            // image name pujork.png

            $uploadDir = __DIR__ . "/../assets/uploads/";

            $fileName = time() . "_" . basename($image['name']);
            // 3:43_pujork.png

            $targetFile = $uploadDir . $fileName;
            // assets/uploads3:43_pujork.png

            move_uploaded_file($image['tmp_name'], $targetFile);


            $itemModel = new Item();

            $rs = $itemModel->create($user_id,$name,$fileName);

            if($rs){
                echo 'Success';
            }else{
                echo 'Failed';
            }
            
        }

        public function update(){
            
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $oldImage = $_POST['old_image'] ?? ''; // coming from hidden input in form
            $image = $_FILES['image'] ?? null;

            $uploadDir = __DIR__ . "/../assets/uploads/";
            $fileName = $oldImage; // default keep old image

            // if a new image is uploaded
            if ($image && $image['error'] === UPLOAD_ERR_OK) {
                // generate new file name
                $fileName = time() . "_" . basename($image['name']);
                $targetFile = $uploadDir . $fileName;

                // move uploaded file
                if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                    // delete old file if exists
                    $oldPath = $uploadDir . $oldImage;
                    if (file_exists($oldPath) && !empty($oldImage)) {
                        unlink($oldPath);
                    }
                }
            }

            $itemModel = new Item();
            $rs = $itemModel->update($id, $name, $fileName);

            if($rs){
                echo "Success";
            } else {
                echo "Failed";
            }
        }


        public function destroy(){

            $id = $_POST['id'] ?? '';
            $imageName = $_POST['image'] ?? '';


            // echo $imageName;

            $itemModel = new Item();


            $imagePath = __DIR__.'/../assets/uploads/'.$imageName;

            unlink($imagePath);


            $rs = $itemModel->delete($id);
            if($rs){
                echo 'Success';
            }else{
                echo 'Fail';
            }

            
        }

        public function getAllData(){

            $user_id = $_POST['userid'] ?? "";

            $itemModel = new Item();

            $items = $itemModel->getAllData($user_id);

            foreach($items as $i){
                $id = $i['id'];
                $name = $i['name'];
                $image = $i['image'];  // stored filename like "1692952384_pizza.png"
                $username = $i['username'];

                echo <<<HTML
                    <tr class="align-middle">
                        <td>$id</td>
                        <td>
                            <div style="width: 40px;height: 40px;" class="overflow-hidden bg-success rounded-3">
                                <img src="app/assets/uploads/$image" alt="" class="w-100 h-100 object-fit-cover">
                            </div>
                        </td>
                        <td>
                            <span class="text-success">$name</span>
                        </td>
                        <td>
                            <span class="text-secondary">Add BY: <span class="text-dark">$username</span></span>
                        </td>
                        <td>
                            <span class="bg-secondary-subtle text-secondary px-3 rounded-3">2025-07-31</span>
                        </td>
                        <td class="text-center">

                            <button data-name="$name" data-id="$id" data-image="$image" class="btn btn-warning btn-up-item" data-bs-toggle="modal" data-bs-target="#modalupitem">
                                <i class="bi bi-vector-pen text-light"></i>
                            </button>
                            
                            <button data-id="$id" data-image="$image" class="btn btn-danger btn-delete-item" data-bs-toggle="modal" data-bs-target="#modaldeleteitem">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </td>
                    </tr>
                HTML;
            }  

        }
    }
?>