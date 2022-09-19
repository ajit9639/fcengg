<?php
include "./include/header.php";
include "./include/sidebar.php";
// check session start
if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}


$getid = $_GET['id'];
$type = $_GET['type'];
// data delete
if($getid != "" AND $type == "delete"){
    $query = mysqli_query($conn , "delete from `category` WHERE `cat_id`='$getid'");
    if($query){
        echo "<script>location.replace('categories.php');</script>";
    }
}


// data insertion
$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $category = $_POST["category"];    
     
    $banner_img = $_FILES["banner_img"];  
    $banner_img_name = $banner_img['name'];
    $banner_img_tmp_name = $banner_img['tmp_name'];

    $check_cat = mysqli_query($conn,"SELECT * FROM `banners` WHERE `banner_url`='$banner_url'");
    
     
    if (!empty($_FILES['banner_img']['tmp_name'])) {
        $banner_data = addslashes(file_get_contents($banner_img_tmp_name));   
        $ins_cat = mysqli_query($conn,"UPDATE `banners` SET `banner_img`='$banner_data',`banner_url`='$banner_url' where `banner_id`='$getid'");       
    }else{
        
        $ins_cat = mysqli_query($conn,"UPDATE `banners` SET `banner_url`='$banner_url' where `banner_id`='$getid'");
    }

if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>window.location='categories.php';</script>";
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Already Exist
    </div>';
}
}
// data fetch
$check_cat = mysqli_query($conn,"SELECT * FROM `category` WHERE `cat_id`='$getid'");
$data = mysqli_fetch_assoc($check_cat);
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php
            include "./include/head.php";
         ?>

        <section class="content-header">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header ">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">All Categories</h6> -->
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="m-0 font-weight-bold text-primary">Add Categories</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="categories.php" class="btn btn-primary btn-sm ">View Catergory
                                </a>


                            </div>
                        </div>
                    </div>
                   
                </div>


                <?= $success ?>
                    <?= $unsuccess ?>
                <div class="card-body">
                    <form  method="POST" enctype="multipart/form-data" class="form-horizontal">

                        
                        <div class="row  p-2">
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Category Name"
                                        name="category" value=<?= $data['cat_name']?>>
                                </div>
                            </div>

                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>


    <?php 
    include "./include/footer.php";
?>