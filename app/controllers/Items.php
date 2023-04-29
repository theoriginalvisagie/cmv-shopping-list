<?php
  class Items extends Controller{
    public function __construct(){
      // Load Models
      $this->itemModel = $this->model("Item");
    }

    // Load All Posts
    public function index(){
      $items = $this->itemModel->getItems();
      

      $data = [
        "items" => $items
      ];
      
      $this->view("items/index", $data);
    }

    // Add Item
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          "item" => trim($_POST['item']),
          "qty" => trim($_POST['quantity']),  
          "item_err" => '',
          "qty_err" => ""
        ];

        if(empty($data['item'])){
          $data['item_err'] = "Please enter a name";

          if(empty($data['quantity'])){
            $data['qty_err'] = "Please enter a quantity";
          }
        }

        // Make sure there are no errors
        if(empty($data['item_err']) && empty($data['qty_err'])){
          //Validation passed
          //Execute
          if($this->itemModel->addItem($data)){
            // Redirect to login
            flash("items_added", "Items Added");
            redirect();
          } else {
            die("Something went wrong");
          }
        } else {
          // Load view with errors
          $this->view("items/add", $data);
        }

      } else {
        $data = [
          'item' => '',
          'qty' => '',
        ];

        $this->view('items/add', $data);
      }
    }

    // Edit Post
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          "item" => trim($_POST['item']),
          "qty" => trim($_POST['quantity']),  
          "id" => trim($_POST['id']), 
          "checked" => trim($_POST['checked']),   
          "item_err" => '',
          "qty_err" => ""
        ];

         // Validate email
        if(empty($data['item'])){
          $data['item_err'] = "Please enter a name";

          if(empty($data['quantity'])){
            $data['qty_err'] = "Please enter a quantity";
          }
        }

        // Make sure there are no errors
        if(empty($data['item_err']) && empty($data['qty_err'])){
          // Validation passed
          //Execute
          if($this->itemModel->updateItem($data)){
          // Redirect to login
          flash('item_message', 'item Updated');
          redirect();
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('items/edit', $data);
        }

      } else {
        // Get post from model
        $item = $this->itemModel->getItemById($id);
        $data = [
          'id' => $id,
          'item' => $item['item'],
          'qty' => $item['qty'],
          'checked' => $item['checked']
        ];

        $this->view('items/edit', $data);
      }
    }

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          // Redirect to login
          flash('post_message', 'Post Removed');
          redirect('items');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('items');
      }
    }
  }