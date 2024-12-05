<?php
  class Lists extends Controller{
    public function __construct(){
      // Load Models
      $this->listModel = $this->model("ListsModel");
    }

    // Load All Posts
    public function index(){
      $lists = $this->listModel->getLists();

      $data = [
        "lists" => $lists
      ];
      
      $this->view("lists/index", $data);
    }

     //Add List
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          "name" => trim($_POST['name']),
          "description" => trim($_POST['description']),
          "name_err" => '',
          "description_err" => ""
        ];

        if(empty($data['name'])){
          $data['name_err'] = "Please enter a name";

          if(empty($data['description'])){
            $data['description_err'] = "Please enter a quantity";
          }
        }

        // Make sure there are no errors
        if(empty($data['name_err']) && empty($data['description_err'])){
          //Validation passed
          //Execute
          if($this->listModel->addList($data)){
            // Redirect to login
            flash("list_added", "List Added");
            redirect();
          } else {
            die("Something went wrong");
          }
        } else {
          // Load view with errors
          $this->view("lists/add", $data);
        }

      } else {
        $data = [
          'name' => '',
          'description' => '',
        ];

        $this->view('lists/add', $data);
      }
    }
//
//    // Edit Post
//    public function edit($id){
//      if($_SERVER['REQUEST_METHOD'] == 'POST'){
//        // Sanitize POST
//        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//
//        $data = [
//          "item" => trim($_POST['item']),
//          "qty" => trim($_POST['quantity']),
//          "id" => trim($_POST['id']),
//          "checked" => trim($_POST['checked']),
//          "item_err" => '',
//          "qty_err" => ""
//        ];
//
//         // Validate email
//        if(empty($data['item'])){
//          $data['item_err'] = "Please enter a name";
//
//          if(empty($data['quantity'])){
//            $data['qty_err'] = "Please enter a quantity";
//          }
//        }
//
//        // Make sure there are no errors
//        if(empty($data['item_err']) && empty($data['qty_err'])){
//          // Validation passed
//          //Execute
//          if($this->itemModel->updateItem($data)){
//          // Redirect to login
//          flash('item_message', 'item Updated');
//          redirect();
//          } else {
//            die('Something went wrong');
//          }
//        } else {
//          // Load view with errors
//          $this->view('items/edit', $data);
//        }
//
//      } else {
//        // Get post from model
//        $item = $this->itemModel->getItemById($id);
//        $data = [
//          'id' => $id,
//          'item' => $item['item'],
//          'qty' => $item['qty'],
//          'checked' => $item['checked']
//        ];
//
//        $this->view('items/edit', $data);
//      }
//    }
//
//    // Delete Post
//    public function delete($id){
//      if($_SERVER['REQUEST_METHOD'] == 'POST'){
//        //Execute
//        if($this->postModel->deletePost($id)){
//          // Redirect to login
//          flash('post_message', 'Post Removed');
//          redirect('items');
//          } else {
//            die('Something went wrong');
//          }
//      } else {
//        redirect('items');
//      }
//    }
  }