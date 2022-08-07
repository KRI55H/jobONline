<?php
    include('../env.php');
   
    if(!isset($_GET['task'])){
        header('location: ../admin/login.php');
    }else{
        $task = $_GET['task'];

        // add jobs
        if($task == "add"){
            $title = $_REQUEST['title'];
            $role = $_REQUEST['role'];
            $description = $_REQUEST['description'];
            $job_category = $_REQUEST['job_category'];
            $number_of_employee =$_REQUEST['number_of_employee'];
            $job_type = $_REQUEST['job_type'];
            $city = $_REQUEST['city'];
            $query = mysqli_query($db_connect,"INSERT INTO jobs(title,description,job_type,ref_id,required_employee,role,city) VALUES('$title','$description','$job_type','$job_category','$number_of_employee','$role','$city')") or die("0");
            if($query){
                echo "1";
            }else{
                echo "0";
            }
        }

        // delete jobs
        if($task == "delete"){
            $id = $_REQUEST['id'];
            $query = mysqli_query($db_connect,"DELETE FROM jobs WHERE id = '$id'") or die("0");
            if($query){
                echo "1";
            }else{
                echo "0";
            }
        }

        // view data
        if($task == "view"){
            $id = $_REQUEST['id'];
            $query = mysqli_query($db_connect,"SELECT * FROM jobs WHERE id = '$id'") or die("0");
            if($query){
                $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
                $row['status'] = "1";
                $json = json_encode($row);
                echo $json;
            }else{
                echo "0";
            }
        }

        // edit job
        if($task == "edit"){
            $id = $_REQUEST['id'];
            $title = $_REQUEST['title'];
            $role = $_REQUEST['role'];
            $description = $_REQUEST['description'];
            $job_category = $_REQUEST['job_category'];
            $number_of_employee =$_REQUEST['number_of_employee'];
            $job_type = $_REQUEST['job_type'];
            $city = $_REQUEST['city'];
            $query = mysqli_query($db_connect,"UPDATE jobs set title='$title', description='$description', job_type='$job_type', ref_id='$job_category', required_employee='$number_of_employee', role='$role', city='$city' where id = '$id'") or die("0");
            if($query){
                echo "1";
            }else{
                echo "0";
            }
        }

        //filter
        if($task == "filter"){
            $ref_id = $_REQUEST['ref_id'];
            $data = "";
            if($ref_id == "*"){
                $data = mysqli_query($db_connect,"select jobs.*, category.name as category from jobs join category on jobs.ref_id = category.id ORDER BY id DESC") or die('NO DATA FOUND');
                $rows = mysqli_fetch_all($data,true);
                $is_empty = mysqli_num_rows($data);
            }else{
                $data = mysqli_query($db_connect,"select jobs.*, category.name as category from jobs join category on jobs.ref_id = category.id where ref_id = '$ref_id' ORDER BY id DESC") or die('NO DATA FOUND');
                $rows = mysqli_fetch_all($data,true);
                $is_empty = mysqli_num_rows($data);
            }           
            
            if($is_empty != 0){
                $jobs = "";
                $i = 1;
                foreach($rows as $row){
                    $jobs .= '<div class="col-md-4 mb-5" id="'.$row['id'].'">
                        <div class="container text-light p-2" style="border-radius: 5vh; background-color: rgba(0,0,0,.7);">
                            <div class="row rounded-pill h-100">
                                <div class="col-md-2 ri-archive-fill fs-1 d-flex align-items-center justify-content-center"></div>
                                <div class="col-md-8 p-3">    
                                    <div class="row mb-2">
                                        Title : '.$row['title'].'<br>
                                        Category : '.$row['category'].'<br>
                                        Role : '.$row['role'].'
                                    </div>
                                </div>
                                <div class="col-md-2 mt-auto mb-auto">
                                        <button class="badge btn-danger fs-6 shadow-none border-0 rounded-circle p-2 mb-1 mt-1" id="delete-btn" data-id="'.$row['id'].'"><i class="ri-delete-bin-line"></i></button>
                                        <button class="badge btn-primary fs-6 shadow-none border-0 rounded-circle p-2 mb-1 mt-1" data-bs-toggle="modal" data-id="'.$row['id'].'" data-bs-target="#edit-job" id="edit-btn"><i class="ri-pencil-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                echo $jobs;    
            }else{
                echo "<h1 class='text-center'>NO DATA FOUND</h1>";
            }
        }

    }
?>