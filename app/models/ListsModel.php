<?php
  class ListsModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getLists(){
      $sql = "SELECT * FROM lists";

      $this->db->query($sql);

      $results = $this->db->resultset();

      return $results;
    }


    public function addList($data){
      // Prepare Query
      $sql = "INSERT INTO lists (name, description) VALUES (:name, :description)";
      $this->db->query($sql);

      // Bind Values
      $this->db->bind(":name", $data['name']);
      $this->db->bind(":description", $data['description']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    function getListById($id){
      $sql = "SELECT * FROM lists WHERE id = $id";
      $this->db->query($sql);

      $results = $this->db->resultset();
      $results = json_decode(json_encode($results), true);
      return $results[0];
    }

    function updateList($data){
      // Prepare Query
      $sql = "UPDATE lists SET name=:name, description=:description WHERE id=:id";
      $this->db->query($sql);
      // Bind Values
      $this->db->bind(":name", $data['name']);
      $this->db->bind(":description", $data['description']);
      $this->db->bind(":id", $data['id']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }