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
        }
    }
?>