<?php include('./layouts/header.php')?>
<div class="container-fluid bg-light pt-4">
    <!-- add job head -->
    <div class="row p-2 ps-5 pe-3">        
        <div class="p-0 text-start col-3">
            <select class="form-control form-select" id="categoryWise">
                <option value="*" selected>All</option>
                <?php 
                    $data = mysqli_query($db_connect,"select * from category");
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
    <div class="row p-4 m-0" id="jobs">
        <?php 
            $data = mysqli_query($db_connect,"select jobs.*, category.name as category from jobs join category on jobs.ref_id = category.id ORDER BY id DESC") or die('NO DATA FOUND');
            $rows = mysqli_fetch_all($data,true);
            $i = 1;
            foreach($rows as $row){
        ?>
        <div class="col-md-4 mb-5" id="<?=$row['id']?>">
            <div class="container text-light p-2" style="border-radius: 5vh; background-color: rgba(0,0,0,.7);">
                <div class="row rounded-pill h-100">
                    <div class="col-md-2 ri-archive-fill fs-1 d-flex align-items-center justify-content-center"></div>
                    <div class="col-md-8 p-3">    
                        <div class="row mb-2">
                            Title : <?=$row['title']?><br>
                            Category : <?=$row['category']?><br>
                            Role : <?=$row['role']?>
                        </div>
                    </div>
                    <div class="col-md-2 mt-auto mb-auto">
                            <button class="badge btn-danger fs-6 shadow-none border-0 rounded-circle p-2 mb-1 mt-1" id="delete-btn" data-id="<?=$row['id']?>"><i class="ri-delete-bin-line"></i></button>
                            <button class="badge btn-primary fs-6 shadow-none border-0 rounded-circle p-2 mb-1 mt-1" data-bs-toggle="modal" data-id="<?=$row['id']?>" data-bs-target="#edit-job" id="edit-btn"><i class="ri-pencil-line"></i></button>
                    </div>
                </div>
            </div>    
        </div>
        <?php }?>
    </div>

    <!--Add Modal -->
    <div class="modal fade" id="add-job" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <span class="text-center fs-4 ps-2"> ADD NEW JOB</span>
                <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 p-2" method="post" id="addJob">
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
                        <label for="inputCategory" class="form-label">Category</label>
                        <select id="inputCategory" class="form-select" name="job_category">
                            <option value="" selected disabled>Choose an option</option>
                            <?php 
                                $data = mysqli_query($db_connect,"select * from category");
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
                        <label for="inputType" class="form-label">Job type</label>
                        <select id="inputType" class="form-select" name="job_type">
                        <option value="" selected disabled>Choose an option</option>
                        <option value="Remote Job">Remote Job</option>
                        <option value="Stable Job">Stable Job</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city">
                    </div>
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary ps-5 pe-5">ADD JOB</button>
                    </div>             
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- edit job -->
    <div class="modal fade" id="edit-job" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <span class="text-center fs-4 ps-2"> EDIT JOB</span>
                <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 p-2" method="post" id="editJob">
                    <input type="hidden" name="id" id="editID">
                    <div class="col-md-8">
                        <label for="editTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="editTitle">
                    </div>
                    <div class="col-md-4">
                        <label for="editRole" class="form-label">Role</label>
                        <input type="text" class="form-control" id="editRole" name="role">
                    </div>
                    <div class="col-12">
                        <label for="editDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="editDescription">
                    </div>
                    <div class="col-md-8">
                        <label for="editCategory" class="form-label">Category</label>
                        <select id="editCategory" class="form-select" name="job_category" >
                            <option value="" selected disabled>Choose an option</option>
                            <?php 
                                $data = mysqli_query($db_connect,"select * from category");
                                $rows = mysqli_fetch_all($data,true);
                                $i = 1;
                                foreach($rows as $row){
                            ?>
                            <option value="<?=$row['id']?>"><?=$row['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="editNumber" class="form-label">Vacency</label>
                        <input type="number" class="form-control" id="editNumber" name="number_of_employee">
                    </div>
                    <div class="col-md-8">
                        <label for="editType" class="form-label">Job type</label>
                        <select id="editType" class="form-select" name="job_type">
                        <option value="" selected disabled>Choose an option</option>
                        <option value="Remote Job">Remote Job</option>
                        <option value="Stable Job">Stable Job</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="editCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="editCity" name="city">
                    </div>
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary ps-5 pe-5" >EDIT JOB</button>
                    </div>             
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include('./layouts/footer.php')?>
<script>
    $("#closeModel").click(function(){
        $(".text-danger").html(" ");
    });

    // add job
    $("#addJob").submit(function(e){
        e.preventDefault();
        $("#addJob").validate({
            rules:{
                title : "required",
                role : "required",
                description : "required",
                job_category : "required",
                number_of_employee : "required",
                job_type : "required",
                city : "required"
            },
            messages:{
                title : "Please enter job title.",
                role : "Please enter employee role.",
                description : "Please enter job description",
                job_category : "Please select category",
                number_of_employee : "Please enter vacency.",
                job_type : "Please select job type",
                city : "Please enter city"
            },
            errorClass: "text-danger",
        });
        let isValid = $("#addJob").valid();
        if(isValid){
            let formData = new FormData($("#addJob")[0]);
            $.ajax({
                url : "../controller/jobsController.php?task=add",
                type : "POST",
                dataType : "JSON",
                cache: false,
                async : true,
                processData : false,
                contentType: false,
                data : formData,
                success : function(data){
                    if(data == 1){
                        $("#add-job").modal('hide');
                        location.reload(true);
                    }else{
                        alert("FAILED TO ADD JOB.");
                    };
                }
            });
        }
    });

    // edit job details
    $("#editJob").submit(function(e){
        e.preventDefault();
        $("#editJob").validate({
            rules:{
                title : "required",
                role : "required",
                description : "required",
                job_category : "required",
                number_of_employee : "required",
                job_type : "required",
                city : "required"
            },
            messages:{
                title : "Please enter job title.",
                role : "Please enter employee role.",
                description : "Please enter job description",
                job_category : "Please select category",
                number_of_employee : "Please enter vacency.",
                job_type : "Please select job type",
                city : "Please enter city"
            },
            errorClass: "text-danger",
        });
        let isValid = $("#editJob").valid();
        if(isValid){
            let formData = new FormData($("#editJob")[0]);
            $.ajax({
                url : "../controller/jobsController.php?task=edit",
                type : "POST",
                dataType : "JSON",
                cache: false,
                async : true,
                processData : false,
                contentType: false,
                data : formData,
                success : function(data){
                    if(data == 1){
                        $("#edit-job").modal('hide');
                        location.reload(true);
                    }else{
                        alert("FAILED TO EDIT JOB.");
                    };
                }
            });
        }
    });

    // view job details
    $(document).on('click',"#view-btn, #edit-btn",function(){
        let id = $(this).data('id');
        $("#editID").attr('value',id);
        $.ajax({
            url : "../controller/jobsController.php?task=view",
            type : "GET",
            data : {id : id},
            success : function(data){
                arr = $.parseJSON(data);
                if(arr.status == 1){  
                    $("#editTitle").val(arr.title);
                    $("#editRole").val(arr.role);
                    $("#editDescription").val(arr.description);
                    $("#editCategory").val(arr.ref_id);
                    $("#editNumber").val(arr.required_employee);
                    $("#editType").val(arr.job_type);
                    $("#editCity").val(arr.city);
                }else{
                    alert("FAILED TO GET JOB DATA");
                };
            }
        });
    });

    // delete
    $(document).on('click',"#delete-btn",function(){
        let id = $(this).data('id');
        $.ajax({
            url : "../controller/jobsController.php?task=delete",
            type : "POST",
            data : {id : id},
            success : function(data){
                if(data == 1){
                    $("#"+id).hide();         
                    location.reload(true);
                }else{
                    alert("FAILED TO DELETE JOB");
                };
            }
        });
    });

    // category filter
    $("#categoryWise").change(function(){
        ref_id = $(this).val();
        $.ajax({
            url : "../controller/jobsController.php?task=filter",
            type : "GET",
            data : {ref_id : ref_id},
            success : function(data){
                $("#jobs").html(data);
            }
        });
    });
</script>

    <body>
</html>