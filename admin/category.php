<?php include('./layouts/header.php')?>
<div class="container-fluid bg-light pt-4">
    <!-- add job head -->
    <div class="p-0 text-end">
        <button class="btn btn-success rounded-3 ps-5 pe-5" data-bs-toggle="modal" data-bs-target="#add-category">ADD</button>
    </div>
    <table class="table table-striped mt-2">
        <thead class="text-center">
            <th>ID</th>
            <th>NAME</th>
           
            <th>ACTION</th>
        </thead>
        <tbody>
            <?php 
                $data = mysqli_query($db_connect,"select * from category ORDER BY ID DESC");
                $rows = mysqli_fetch_all($data,true);
                $i = 1;
                foreach($rows as $row){
            ?>
                <tr id="<?=$row['id']?>">
                    <td class="text-center"><?= $i?></td>
                    <td><?= $row['name']?></td>
                    <td class="text-center">
                        <button class="badge btn-danger shadow-none border-0 rounded-circle p-2 ms-1 me-1" data-id="<?=$row['id']?>" data-row="<?=$i?>" id="delete-btn"><i class="ri-delete-bin-line"></i></button>
                        <button class="badge btn-primary shadow-none border-0 rounded-circle p-2 ms-1 me-1" data-bs-toggle="modal" data-id="<?=$row['id']?>" data-name="<?=$row['name']?>" data-bs-target="#edit-category" id="edit-btn"><i class="ri-pencil-line"></i></button>
                    </td>
                </tr>
            <?php 
                $i ++;
                }
            ?>
        </tbody>
    </table>

    <!-- add model -->
    <div class="modal fade" id="add-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <span class="text-center fs-4 ps-2"> ADD NEW CATEGORY</span>
                    <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="g-3 p-2" method="post" id="addCategory">
                        <div class="form-group">
                            <label for="addTitle" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" id="addTitle">
                        </div>
                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary ps-5 pe-5" >ADD CATEGORY</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit model -->
    <div class="modal fade" id="edit-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <span class="text-center fs-4 ps-2"> EDIT CATEGORY</span>
                    <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="g-3 p-2" method="post" id="editCategory">
                        <input type="hidden" name="id" id="editID">
                        <div class="form-group">
                            <label for="editTitle" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" id="editTitle">
                        </div>
                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary ps-5 pe-5" >EDIT CATEGORY</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./layouts/footer.php')?>
<script>
// add job
    $("#addCategory").submit(function(e){
        e.preventDefault();
        $("#addCategory").validate({
            rules:{
                name : "required",
            },
            messages:{
                name : "Please enter category name.",
            },
            errorClass: "text-danger",
        });
        let isValid = $("#addCategory").valid();
        if(isValid){
            let formData = new FormData($("#addCategory")[0]);
            $.ajax({
                url : "../controller/categoryController.php?task=add",
                type : "POST",
                dataType : "JSON",
                cache: false,
                async : true,
                processData : false,
                contentType: false,
                data : formData,
                success : function(data){
                    if(data == 1){
                        $("#add-category").modal('hide');
                        location.reload(true);
                    }else{
                        alert("FAILED TO ADD CATEGORY.");
                    };
                }
            });
        }
    });

     // edit category details
    $(document).on("click","#edit-btn", function(){
        $("#editID").attr("value",$(this).data('id'));
        $("#editTitle").attr("value",$(this).data('name'));
    });
     $("#editCategory").submit(function(e){
        e.preventDefault();
        $("#editCategory").validate({
            rules:{
                name : "required",
            },
            messages:{
                name : "Please enter category name.",
            },
            errorClass: "text-danger",
        });
        let isValid = $("#editCategory").valid();
        if(isValid){
            let formData = new FormData($("#editCategory")[0]);
            $.ajax({
                url : "../controller/categoryController.php?task=edit",
                type : "POST",
                dataType : "JSON",
                cache: false,
                async : true,
                processData : false,
                contentType: false,
                data : formData,
                success : function(data){
                    if(data == 1){
                        $("#edit-category").modal('hide');
                        location.reload(true);
                    }else{
                        alert("FAILED TO EDIT CATEGORY.");
                    };
                }
            });
        }
    });

     // delete
     $(document).on('click',"#delete-btn",function(){
        let id = $(this).data('id');
        $.ajax({
            url : "../controller/categoryController.php?task=delete",
            type : "POST",
            data : {id : id},
            success : function(data){
                if(data == 1){
                    $("#"+id).hide();         
                    location.reload(true);
                }else{
                    alert("FAILED TO DELETE CATEGORY");
                };
            }
        });
    });
</script>
<body>
</html>