<?php
    session_start();
     if(!isset($_SESSION['username'])){
        header('location:./login.php');
     }
     include('env.php');
?>
<html>
    <head>
        <title>Users</title>
        <link rel="stylesheet" href="./assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/main.css">
    </head>
    <body>
    <div id="loader">
          <img src="./assets/img/loader.gif" id="loader-image">
    </div>

    <!-- navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brane nav-link text-light"><b>jobONline</b></a>
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-light" href="./index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="./jobs.php">Jobs</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="./users.php">Users</a></li>
            </ul>
            <button class="btn btn-primary shadow-none">Logout</button>
        </div>
    </nav>
    <!-- conent -->
    <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>MOBILE NUMBER</th>
                <th>ACTION</th>
            </thead>
            <tbody>
            <?php 
                $data = mysqli_query($db_connect,"select * from users");
                $rows = mysqli_fetch_all($data,true);
                $i = 0;
                foreach($rows as $row){
            ?>
                <tr id="<?=$i?>">
                    <td><?= $i?></td>
                    <td><?= $row['name']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['mobile_number']?></td>
                    <td>
                        <button class="badge btn-danger shadow-none border-0 p-2" data-id="<?=$row['id']?>" data-row="<?=$i?>" id="delete-btn">Delete</button>
                    </td>
                </tr>
                
            <?php 
                $i ++;
                }
            ?>
        </tbody>
    </table>
    <!-- externel js -->
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="./assets/js/jquery.validate.js"></script>
    <script src="./assets/js/main.js"></script>

    <script>
        $(document).on('click','#delete-btn',function(){
            let rowID = $(this).data('row');
            setTimeout(function(){
                $("#"+rowID).slideUp();    
            }, 1500);
            
        })
    </script>
    <body>
</html>