<?php
include "./include/header.php";
include "./include/sidebar.php";


if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}
// location.replace('login.php')



$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $category = $_POST["category"];  

    $cat_img = $_FILES["cat_image"];  
    $cat_img_name = $cat_img['name'];
    $cat_img_tmp_name = $cat_img['tmp_name'];
    $cat_data = addslashes(file_get_contents($cat_img_tmp_name));
    
    
    $check_cat = mysqli_query($conn,"SELECT * FROM `category` WHERE `cat_name`='$category'");
    $cat_num = mysqli_num_rows($check_cat);
    // echo $cat_num;
    if($cat_num == 0){   
$ins_cat = mysqli_query($conn,"INSERT INTO `category`(`cat_name`,`cat_image`) VALUES ('$category','$cat_data')");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
}else{
    echo "<script>alert('Alread exist')</script>";
}
}


?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php
            include "./include/head.php";
         ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header ">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">All Categories</h6> -->
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                        </div>
                        <div class="col-md-2">
                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm ">Add
                                New
                                </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>SNO</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                           
                                <?php
                                $s =1;
                                $getcat = mysqli_query($conn,"SELECT * FROM `category`");
                                while($get = mysqli_fetch_assoc($getcat)){   
                                    $mg =   $get['cat_image'];                            
                                ?>
                                <tr>
                                    <td><?= $s?></td>
                                    <td><?= $get['cat_name']?></td>
                                    <td>                                        
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
                                   </td>
                                    <td><a href="categories_edit.php?id=<?= $get['cat_id']?>&& type=edit" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a> 
                                         <a href="categories_edit.php?id=<?= $get['cat_id']?>&&type=delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                    
                                </tr>
                                <?php $s++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



        <!-- popup model -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                     <?= $success ?>
                    <?= $unsuccess ?>
                 <form  method="POST" enctype="multipart/form-data" class="form-horizontal">                        
                        <div class="row  p-2">
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Category Name"
                                        name="category">
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category Image (160*120)</label>
                                <div>
                                    <input type="file" class="form-control input-md" 
                                        name="cat_image">
                                </div>
                            </div>

                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- popup model -->




        <?php 
    include "./include/footer.php";
?>