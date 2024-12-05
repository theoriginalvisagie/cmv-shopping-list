<?php
    require_once ("../../app/config/config.php");
    require_once ("../../app/libraries/Database.php");
    

    if(isset($_POST['action'])){
        if($_POST['action'] == "removeItemFromDB"){
            $sql = "DELETE FROM items WHERE id = '{$_POST['id']}'";
            $db = new Database();
            $db->query($sql);

            $res = $db->execute();

            if($res){
                echo "true";
            }else{
                echo "false";
            }
        }else if($_POST['action'] == "removeListFromDB"){
            $sql = "DELETE FROM lists WHERE id = '{$_POST['id']}'";
            $db = new Database();
            $db->query($sql);

            $res = $db->execute();
            echo $res;
            if($res){
                echo "true";
            }else{
                echo "false";
            }
        }else if($_POST['action'] == "markAsRead"){
            $sql = "UPDATE notifications SET has_read = 'Yes' WHERE id = '{$_POST['id']}'";
            $db = new Database();
            $db->query($sql);

            $res = $db->execute();

            if($res){
                echo "true";
            }else{
                echo "false";
            }
        }else if($_POST['action'] == "checkItem"){
            print_r($_POST);
            if($_POST['checked'] == "true"){
                $checked = "Yes";
            }else{
                $checked = "No";
            }
            $sql = "UPDATE items SET checked = '$checked' WHERE id = '{$_POST['id']}'";
            $db = new Database();
            $db->query($sql);

            $res = $db->execute();

            if($res){
                echo "true";
            }else{
                echo "false";
            }
        }
    }
?>