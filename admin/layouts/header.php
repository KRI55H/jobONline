<?php
    session_start();
     if(!isset($_SESSION['username'])){
        header('location: login.php');
     }
     include('../env.php');
?>
<html>
    <head>
        <title>jobONline</title>
        <link rel="stylesheet" href="../assets/libs/bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="../assets/libs/RemixIcon_Fonts_v2.5.0/fonts/remixicon.css">
    </head>
    <body class="bg-light">
    <!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brane nav-link text-light fs-4">jobONline</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link text-light" href="./index.php">DASHBOARD</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="./users.php">USERS</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="./jobs.php">JOBS</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="./category.php">CATEGORY</a></li>
        </ul>            
    </div>
    <a href="../admin/logout.php" class="btn btn-primary shadow-none rounded-3 ps-4 pe-4">LOGOUT</a>
  </div>
</nav>