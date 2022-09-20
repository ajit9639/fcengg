<?php
include "./include/header.php";
include "./include/sidebar.php";
// check session start
if(!isset($_SESSION['admin'])){
    echo "<script>location.replace('login.php');</script>";
}else{
    echo "";
}


$success="";
$unsuccess="";
if(isset($_POST['send'])){
    $product_name = $_POST['product_name'];
    $product_mrp_price = $_POST['product_mrp_price'];
    $product_sale_price = $_POST['product_sale_price'];

    $product_cat = $_POST['product_cat'];
    $product_subcat = $_POST['product_subcat'];
    $product_brand = $_POST['product_brand'];

    $product_description = $_POST['product_description'];
    $product_specification = $_POST['product_specification'];    

$ins_cat = mysqli_query($conn,"INSERT INTO `products`(`product_name`, `product_mrp_price`, `product_sale_price`, `product_category`, `product_subcat`, `product_brand`, `product_description`, `product_specification`) VALUES ('$product_name','$product_mrp_price','$product_sale_price','$product_cat','$product_subcat','$product_brand','$product_description','$product_specification')");
if($ins_cat){
    $success='<div class="alert alert-primary" role="alert">
    Success
    </div>';
    echo "<script>location.replace('products.php');</script>";
}else{
    $unsuccess='<div class="alert alert-danger" role="alert">
    Unsuccess
    </div>';
}
// }else{
//     echo "<script>alert('Alread exist')</script>";
// }
}
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
                                <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="products.php" class="btn btn-primary btn-sm ">View Products
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
                                <label class=" control-label">Product Name</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Product Name"
                                        name="product_name" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-2">
                                <label class=" control-label">Product MRP Price</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter MRP Price"
                                        name="product_mrp_price" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-2">
                                <label class=" control-label">Product Sale Price</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Enter Sale Price"
                                        name="product_sale_price" required>
                                </div>
                            </div>
                                                      
                           
                           




                            <!-- addon -->
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Category</label>
                                <div>

                                <select  name="product_cat" required="true" onChange="getsubcat(this.value)" class="form-control">
                                <option value="">Select Category</option>
                                <?php $query = mysqli_query($conn,"select * from `category`");
                                while($row = mysqli_fetch_array($query))
                                {?>
                                 <option value="<?php echo $row['cat_id'];?>">
                                 <?php echo $row['cat_name'];?></option>
                                 <?php } ?>
                                 </select>
                                </div>
                            </div>


                            <div class="form-group col-sm-4">
                                <label class=" control-label">Sub Category</label>
                                <div>
                                <select  class="form-control" name="product_subcat" id="product_subcat">
                                </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand</label>
                                <div>
                                    <select name="product_brand" class="form-control input-md">
                                        <option value="" selected disabled>Select Brand</option>
                                        <?php 
                                       $getcat = mysqli_query($conn,"SELECT * FROM `brands`");
                                       while($get = mysqli_fetch_assoc($getcat)){ ?>
                                        <option value="<?= $get['brand_id']; ?>"><?= $get['brand_name']; ?></option>
                                    <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <!-- // addon -->

                            <div class="form-group col-sm-12">
                                <label class=" control-label">Product Description</label>
                                <div>
                                <textarea placeholder="Enter Product Description" name="product_description" id="ckeditor"  class="form-control input-md ckeditor" required></textarea>
                                </div>
                            </div>


                            <div class="form-group col-sm-12">
                                <label class=" control-label">Product Specification</label>
                                <div>
                                <textarea placeholder="Enter Product Description" name="product_specification" id="ckeditor"  class="form-control input-md ckeditor" required></textarea>                                   
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


    
    <script>
    function getsubcat(id) {
    $.ajax({
        type: "POST",
        url: "get_subcategory.php",
        data: '$cat_id=' + id,
        success: function(data) {
           
            $("#product_subcat").html(data);
        }
    });
}
</script>

<script src="./ckeditor/ckeditor.js"></script>
    <?php 
    include "./include/footer.php";
?>