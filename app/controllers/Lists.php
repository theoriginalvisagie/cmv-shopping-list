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
            redirect("lists");
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

    // Edit Post
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          "name" => trim($_POST['name']),
          "description" => trim($_POST['description']),
          "id" => trim($_POST['id']),
          "name_err" => '',
          "description_err" => ""
        ];

         // Validate email
        if(empty($data['name'])){
          $data['name_err'] = "Please enter a name";

          if(empty($data['description'])){
            $data['description_err'] = "Please enter a description";
          }
        }

        // Make sure there are no errors
        if(empty($data['name_err']) && empty($data['description_err'])){
          // Validation passed
          //Execute
          if($this->listModel->updateList($data)){
          // Redirect to login
          flash('item_message', 'List Updated');
          redirect("/lists");
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('lists/edit', $data);
        }

      } else {
        // Get post from model
        $list = $this->listModel->getListById($id);
        $data = [
          'id' => $id,
          'name' => $list['name'],
          'description' => $list['description'],
        ];

        $this->view('lists/edit', $data);
      }
    }
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