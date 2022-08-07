<?php include('./layouts/header.php')?>
    <!-- conent -->
<div class="container-fluid">

<?php
    $user = mysqli_query($db_connect,'select * from users');
    $totalusers = mysqli_num_rows($user);

    $jobs = mysqli_query($db_connect,'select * from jobs');
    $totalJobs = mysqli_num_rows($jobs);

    $jobTypes = mysqli_query($db_connect,'select * from category');
    $totalJobTypes = mysqli_num_rows($jobTypes);
?>
    <div class="row p-3">
        <div class="col-md-3 ps-3 pe-3">
            <div class="row  bg-dark text-light p-3">
                <div class="col-md-3">
                    <i class="ri-user-fill fs-1"></i>
                </div>
                <div class="col-md-9 d-flex justiffy-content-center align-items-center">
                    TOTAL USERS  <br><?=$totalusers?>
                </div>
            </div>    
        </div>
        <div class="col-md-3 ps-3 pe-3">
            <div class="row   bg-dark text-light p-3">
                <div class="col-md-3">
                <i class="ri-bar-chart-2-fill fs-1"></i>
                </div>
                <div class="col-md-9 d-flex justiffy-content-center align-items-center">
                    TOTAL JOBS <br> <?=$totalJobs?>
                </div>
            </div>    
        </div>
        <div class="col-md-3 ps-3 pe-3">
            <div class="row  bg-dark text-light p-3">
                <div class="col-md-3">
                    <i class="ri-file-fill fs-1"></i>
                </div>
                <div class="col-md-9 d-flex justiffy-content-center align-items-center">
                    JOB APPLICATIONS <br> 10
                </div>
            </div>    
        </div>
        <div class="col-md-3 ps-3 pe-3">
            <div class="row  bg-dark text-light p-3">
                <div class="col-md-3">
                    <i class="ri-check-double-line fs-1"></i>
                </div>
                <div class="col-md-9 d-flex justiffy-content-center align-items-center">
                    JOB TYPES<br> <?=$totalJobTypes?>
                </div>
            </div>    
        </div>
    </div>

</div>
    <!-- externel js -->
<?php include('./layouts/footer.php')?>
    <body>
</html>