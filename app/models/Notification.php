<?php
class Notification {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getNotifications(){
        $sql = "SELECT * FROM notifications WHERE has_read != 'Yes'";

        $this->db->query($sql);

        $results = $this->db->resultset();

        return $results;
    }


//    public function addItem($data){
//        // Prepare Query
//        $sql = "INSERT INTO items (item, qty) VALUES (:item, :qty)";
//        $this->db->query($sql);
//
//        // Bind Values
//        $this->db->bind(":item", $data['item']);
//        $this->db->bind(":qty", $data['qty']);
//
//        //Execute
//        if($this->db->execute()){
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    function getItemById($id){
//        $sql = "SELECT * FROM items WHERE id = $id";
//        $this->db->query($sql);
//
//        $results = $this->db->resultset();
//        $results = json_decode(json_encode($results), true);
//        return $results[0];
//    }
//
//    function updateItem($data){
//        // Prepare Query
//        $sql = "UPDATE items SET item=:item, qty=:qty, checked=:checked WHERE id=:id";
//        $this->db->query($sql);
//        // Bind Values
//        $this->db->bind(":item", $data['item']);
//        $this->db->bind(":qty", $data['qty']);
//        $this->db->bind(":id", $data['id']);
//        $this->db->bind(":checked", $data['checked']);
//
//        //Execute
//        if($this->db->execute()){
//            return true;
//        } else {
//            return false;
//        }
//    }

}