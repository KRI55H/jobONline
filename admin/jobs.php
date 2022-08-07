<?php include('./layouts/header.php')?>
<div class="container-fluid bg-light pt-4">
    <!-- add job head -->
    <div class="row p-2 ps-5 pe-3">        
        <div class="p-0 text-start col-3">
            <select class="form-control form-select">
                <?php 
                    $data = mysqli_query($db_connect,"select * from category where is_active = '1'");
                    $rows = mysqli_fetch_all($data,true);
                    $i = 1;
                    foreach($rows as $row){
                ?>
                <option value="<?=$row['id']?>"><?=$row['name']?></option>
                <?php }?>
                        
            </select>
        </div>
        <div class="p-0 text-end col-9">
            <button class="btn btn-success rounded-3 ps-5 pe-5" data-bs-toggle="modal" data-bs-target="#add-job">ADD</button>
        </div>
    </div>
    <!-- job data -->
    <div class="row p-4 m-0">
        <?php for ($x = 1; $x <= 3; $x++) { ?>
        <div class="col-md-4 mb-3">
            <div class="container text-light p-2" style="border-radius: 5vh; background-color: rgba(0,0,0,.7);">
                <div class="row rounded-pill">
                    <div class="col-md-2 ri-archive-fill fs-1 d-flex align-items-center justify-content-center"></div>
                    <div class="col-md-10 p-3">
                        <div class="row mb-2">
                            Title : Web Development<br>
                            Category : Web, Mobile & Software Development<br>
                            Role : Backend Developer
                        </div>
                        <div class="row">
                            <div class="col-12 text-end ps-2 pe-4">
                                <button class="badge btn-danger fs-6 shadow-none border-0 rounded-circle p-2" id="delete-btn"><i class="ri-delete-bin-line"></i></button>
                                <button class="badge btn-primary fs-6 shadow-none border-0 rounded-circle p-2" id="edit-btn"><i class="ri-pencil-line"></i></button>
                                <button class="badge btn-success fs-6 shadow-none border-0 rounded-circle p-2" id="edit-btn"><i class="ri-eye-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <?php }?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add-job" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <span class="text-center fs-4 ps-2"> ADD NEW JOB</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 p-2" method="post" id="addEditJob">
                    <div class="col-md-8">
                        <label for="inputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="inputTitle">
                    </div>
                    <div class="col-md-4">
                        <label for="inputRole" class="form-label">Role</label>
                        <input type="text" class="form-control" id="inputRole" name="role">
                    </div>
                    <div class="col-12">
                        <label for="inputDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="inputDescription">
                    </div>
                    <div class="col-md-8">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" class="form-select" name="category">
                        <option value="" selected disabled>Choose an option</option>
                        <?php 
                            $data = mysqli_query($db_connect,"select * from category where is_active = '1'");
                            $rows = mysqli_fetch_all($data,true);
                            $i = 1;
                            foreach($rows as $row){
                        ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php }?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputNumber" class="form-label">Vacency</label>
                        <input type="number" class="form-control" id="inputNumber" name="number_of_employee">
                    </div>
                    <div class="col-md-8">
                        <label for="inputState" class="form-label">Job type</label>
                        <select id="inputState" class="form-select" name="job_type">
                        <option value="" selected disabled>Choose an option</option>
                        <option>Remote Job</option>
                        <option>Stable Job</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city">
                    </div>
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary ps-5 pe-5" name="addJob" value="add">ADD JOB</button>
                    </div>             
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include('./layouts/footer.php')?>
    <body>
</html>