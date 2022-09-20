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
$getid = $_GET['id'];
if(isset($_POST['send'])){
    $category = $_POST["category"];    
     
    $cat_img = $_FILES["cat_img"];  
    $cat_img_name = $cat_img['name'];
    $cat_img_tmp_name = $cat_img['tmp_name'];
    
     
    if (!empty($_FILES['cat_img']['tmp_name'])) {
        $cat_data = addslashes(file_get_contents($cat_img_tmp_name));   
        $ins_cat = mysqli_query($conn,"UPDATE `category` SET `cat_name`='$category',`cat_image`='$cat_data' where `cat_id`='$getid'");       
    }else{
        
        $ins_cat = mysqli_query($conn,"UPDATE `category` SET `cat_name`='$category' where `cat_id`='$getid'");
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
                                        name="category" value="<?= $data['cat_name'] ?> ">
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category Image</label>
                                <div>
                                <input type="file" class="form-control input-md"  name="cat_img" >
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category Image</label>
                                <div>
                                <?php 
                                 $mg = $data['cat_image'];   
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
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