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
            $stmt->execute();

            // Check if any row was inserted
            if ($stmt->affected_rows > 0) {

                // Get the ID of the last inserted row
                $lastId = $this->conn->insert_id;

                // Prepare statement to fetch the last inserted row
                $stmt = $this->conn->prepare('SELECT * FROM `sizes` WHERE id = ?');
                $stmt->bind_param("i", $lastId);
                $stmt->execute();

                // Get result as associative array
                $result = $stmt->get_result();
                return $result->fetch_assoc();
            } else {
                return null; // No row inserted
            }
        }

        public function get(){
            
        }

        public function update($id){
            
        }

        public function delete($id){
            
        }
    }

?>