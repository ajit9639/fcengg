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
    $brand_name = $_POST["brand_name"];    
    $brand_url = $_POST['brand_url'];

    $brand_img = $_FILES["brand_img"];  
    $brand_img_name = $brand_img['name'];
    $brand_img_tmp_name = $brand_img['tmp_name'];
    $brand_data = addslashes(file_get_contents($brand_img_tmp_name));

    $check_cat = mysqli_query($conn,"SELECT * FROM `brands` WHERE `brand_name`='$brand_name'");
    $cat_num = mysqli_num_rows($check_cat);
    // echo $cat_num;
    if($cat_num == 0){   
$ins_cat = mysqli_query($conn,"INSERT INTO `brands`(`brand_name`, `brand_img`, `brand_url`) VALUES ('$brand_name','$brand_data','$brand_url')");
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
                            <h6 class="m-0 font-weight-bold text-primary">All Brands</h6>
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
                                    <th>Brand Name</th>
                                    <th>Brand Url</th>
                                    <th>Brand Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>SNO</th>
                                <th>Brand Name</th>
                                <th>Brand Url</th>
                                    <th>Brand Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                           
                                <?php
                                $s =1;
                                $getcat = mysqli_query($conn,"SELECT * FROM `brands`");
                                while($get = mysqli_fetch_assoc($getcat)){      
                                    $mg =   $get['brand_img'];                       
                                ?>
                                <tr>
                                    <td><?= $s?></td>
                                    <td><?= $get['brand_name']?></td>
                                    <td><?= $get['brand_url']?></td>
                                    <td>                                        
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
                                   </td>
                                    <td><a href="brands_edit.php?id=<?= $get['brand_id']?>&& type=edit" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a> 
                                         <a href="brands_edit.php?id=<?= $get['brand_id']?>&&type=delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                    
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
                <h5 class="modal-title" id="exampleModalLabel">Add Brands 
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
                                <label class=" control-label">Brand Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Brand Name"
                                        name="brand_name" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Image</label>
                                <div>
                                    <input type="file" class="form-control input-md"  name="brand_img" required>
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Url</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Brand Url"
                                        name="brand_url">
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