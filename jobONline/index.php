<?php
    session_start();
     if(!isset($_SESSION['username'])){
        header('location:./login.php');
     }
?>
<html>
    <head>
        <title>Dashboard</title>
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
                <li class="nav-item"><a class="nav-link text-light" href="./index.php">Jobs</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="./users.php">Users</a></li>
            </ul>
            <button class="btn btn-secondary shadow-none">Logout</button>
        </div>
    </nav>

    <!-- conent -->

    <!-- externel js -->
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="./assets/js/jquery.validate.js"></script>
    <script src="./assets/js/main.js"></script>
    <body>
</html>