<?php
include('../env.php');
   
if(!isset($_GET['task'])){
    header('location: ../admin/login.php');
}else{
    $task = $_GET['task'];
     // delete category
     if($task == "delete"){
        $id = $_REQUEST['id'];
        $query = mysqli_query($db_connect,"DELETE FROM users WHERE id = '$id'");
        if($query){
            echo "1";
        }else{
            echo "0";
        }
    }
    
}
?>