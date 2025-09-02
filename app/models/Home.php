<?php 
    require_once 'config/dbconnection.php';

    class Home{
        private $conn;

        public function __construct()
        {
            $this->conn = Database::connection();
        }

        public function order($cart){
            foreach($cart as $item){
                $itemid   = intval($item['itemid']);
                $userid   = intval($item['userid']);
                $sizeid   = intval($item['sizeId']);
                $qty      = intval($item['qty']);
                $subtotal = floatval($item['subtotal']);

                $stmt = $this->conn->prepare("INSERT INTO `orders`( `user_id`, `item_id`, `size_id`, `qty`, `subtotal`) VALUES (?,?,?,?,?)");
                $stmt->bind_param("iiiid", $userid, $itemid, $sizeid, $qty, $subtotal);
                $stmt->execute();
            }

            return true;
        }

        public function totalorderMonth(){

        }

        public function totalitem(){

        }

        public function totalCustomer(){

        }

        public function totalUsers(){

        }
    }
?>