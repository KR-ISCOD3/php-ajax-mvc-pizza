<?php 

    require_once 'config/dbconnection.php';

    class Item{
        private $conn;

        public function __construct()
        {
            $this->conn = Database::connection();
        }

        public function create($userid,$name,$image){
            $stmt = $this->conn->prepare('INSERT INTO `items`(`user_id`, `name`, `image`) VALUES (?,?,?)');
            $stmt->bind_param("iss",$userid,$name,$image);

            $rs = $stmt->execute();
            return $rs;
        }
      

        public function getAllData($userid){
            // prepare query: join items with users and filter by user_id
            $stmt = $this->conn->prepare(
                'SELECT i.id, i.name, i.image, u.name as username 
                FROM items i
                JOIN users u ON i.user_id = u.id
                WHERE i.user_id = ?
                ORDER BY i.id DESC'
            );

            $stmt->bind_param("i", $userid);  // bind the user_id
            $stmt->execute();

            $result = $stmt->get_result(); 
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            $stmt->close();
            return $data;
        }

        public function delete($id){
            $stmt = $this->conn->prepare('DELETE FROM items WHERE id = ?');
            $stmt->bind_param("i",$id);
            $rs = $stmt->execute();

            return $rs;
        }

        public function update($id, $name, $image = null){
            // If image is provided, update both name & image
            if ($image !== null) {
                $stmt = $this->conn->prepare('UPDATE items SET name = ?, image = ? WHERE id = ?');
                $stmt->bind_param("ssi", $name, $image, $id);
            } else {
                // Only update name
                $stmt = $this->conn->prepare('UPDATE items SET name = ? WHERE id = ?');
                $stmt->bind_param("si", $name, $id);
            }

            $rs = $stmt->execute();
            $stmt->close();
            return $rs;
        }

    }

?>