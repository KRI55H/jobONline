<?php
include('../env.php');
   
if(!isset($_GET['task'])){
    header('location: ../admin/login.php');
}else{
    $task = $_GET['task'];

    // add category
    if($task == "add"){
        $name = $_REQUEST['name'];
        $query = mysqli_query($db_connect,"INSERT INTO category(name) VALUES('$name')") or die("0");
        if($query){
            echo "1";
        }else{
            echo "0";
        }
    }
    
    // edit category
    if($task == "edit"){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $query = mysqli_query($db_connect,"UPDATE category set name='$name' where id = '$id'") or die("0");
        if($query){
            echo "1";
        }else{
            echo "0";
        }
    }

     // delete category
     if($task == "delete"){
        $id = $_REQUEST['id'];
        $query = mysqli_query($db_connect,"DELETE FROM category WHERE id = '$id'") or die("0");
        if($query){
            echo "1";
        }else{
            echo "0";
        }
    }
    
}
?>