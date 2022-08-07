<?php
    include('../env.php');
   
    if(!isset($_GET['task'])){
        header('location: ../admin/login.php');
    }else{
        $task = $_GET['task'];
        if($task == "add"){
            $title = $_GET['title'];
            $role = $_GET['role'];
            $description = $_GET['description'];
            $job_category = $_GET['job_category'];
            $number_of_employee =$_GET['number_of_employee'];
            $job_type = $_GET['job_type'];
            $city = $_GET['city'];
            
            $query = mysqli_query($db_connect,"INSERT INTO jobs VALUES('$title','$description','$job_type','$job_category','$number_of_employee','$role','$city')") or die(0);
            if($query){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    
?>