<?php include('./layouts/header.php')?>
    <!-- conent -->
<div class="container-fluid">
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
                            <button class="badge btn-success fs-6 shadow-none border-0 rounded-circle p-2 mb-1 mt-1" id="apply-btn" data-id="<?=$row['id']?>"><i class="ri-add-fill"></i></button>
                    </div>
                </div>
            </div>    
        </div>
        <?php }?>
    </div>
</div>
    <!-- externel js -->
<?php include('./layouts/footer.php')?>
<script>
    $(document).on('click','#apply-btn',function(){
        alert('applied for job successfully');
    })
</script>
    <body>
</html>