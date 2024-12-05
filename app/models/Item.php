<?php
  class Item {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    public function getItems(){
      $sql = "SELECT * FROM items";
      
      $this->db->query($sql);

      $results = $this->db->resultset();

      // print_r($results,true);
      return $results;
    }


    public function addItem($data){
      // Prepare Query
      $sql = "INSERT INTO items (item, qty) VALUES (:item, :qty)";
      $this->db->query($sql);

      // Bind Values
      $this->db->bind(":item", $data['item']);
      $this->db->bind(":qty", $data['qty']);

      //add a notification

      //Execute
      if($this->db->execute()){
          $notificationAdded = $this->createNotification($this->db->lastInsertId());
          if($notificationAdded){
              return true;
          }else{
              return false;
          }
      } else {
        return false;
      }
    }

    public function createNotification($itemID =""){
        $sql = "INSERT INTO notifications (name, description, item_id, has_read) VALUES (:name, :description, :item_id, :has_read)";
        $this->db->query($sql);

        $this->db->bind(":name", "New Item Added");
        $this->db->bind(":description", "An item as been added to your shopping list");
        $this->db->bind(":item_id", $itemID);
        $this->db->bind(":has_read", "No");

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    function getItemById($id){
      $sql = "SELECT * FROM items WHERE id = $id";
      $this->db->query($sql);

      $results = $this->db->resultset();
      $results = json_decode(json_encode($results), true);
      return $results[0];
    }

    function updateItem($data){
      // Prepare Query
      $sql = "UPDATE items SET item=:item, qty=:qty, checked=:checked WHERE id=:id";
      $this->db->query($sql);
      // Bind Values
      $this->db->bind(":item", $data['item']);
      $this->db->bind(":qty", $data['qty']);
      $this->db->bind(":id", $data['id']);
      $this->db->bind(":checked", $data['checked']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }