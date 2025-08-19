<?php 
    require_once 'config/dbconnection.php';
    class Size{

        private $conn;

        public function __construct()
        {
            $this->conn = Database::connection();
        }

        public function create($size, $price) {
            // Prepare insert statement
            $stmt = $this->conn->prepare('INSERT INTO `sizes`(`size`, `price`) VALUES (?, ?)');
            
            // Bind parameters: "s" = string, "d" = double/float
            $stmt->bind_param("sd", $size, $price);
            
            // Execute the insert
            $rs = $stmt->execute();

            return $rs;

        }

        // getAllData from database
        public function getAllData(){
            $stmt = $this->conn->prepare('SELECT * FROM sizes ORDER BY id DESC');
            $stmt->execute();
            $result = $stmt->get_result();

            $sizes = [];
            while($row = $result->fetch_assoc()){
                $sizes[] = $row;
            }
            return $sizes;
        }

        public function update($id, $size, $price){
            // Prepare insert statement
            $stmt = $this->conn->prepare('UPDATE `sizes` SET `size` = ?, `price` = ? WHERE `id` = ?');
            
            // Bind parameters: "s" = string, "d" = double/float
            $stmt->bind_param("sdi", $size, $price,$id);
            
            // Execute the insert
            $rs = $stmt->execute();

            return $rs;
        }

        public function delete($id){
            
        }
    }

?>