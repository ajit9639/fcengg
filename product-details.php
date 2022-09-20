<style>
    tbody, td, tfoot, th, thead, tr {
    border: 2px solid #e3e3e3!important;    
    padding: 3px 10px;
}
</style>

<?php
include "include/header.php";

$getmyid = $_GET['id'];

$getmyproduct = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `products` where `product_id`='$getmyid'"));
$getproductcategoryid = $getmyproduct['product_category'];

$getmyproductimage = mysqli_query($conn,"SELECT * FROM `products_detail_image` where `products_image_id`='$getmyid'");


?>


    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>product details</li>
                            <li><?= $getmyproduct['product_name'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="product_page_bg">
        <div class="container">
            <div class="product_details_wrapper mb-55">
                <!--product details start-->
                <div class="product_details">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-tab">
                                
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                        <img id="zoom1" src="assets/img/product/productbig5.jpg" data-zoom-image="assets/img/product/productbig5.jpg" alt="big-1">
                                    </a>
                                </div>

                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">

                                    <?php                                       
                                    while($get = mysqli_fetch_assoc($getmyproductimage)){      
                                        $mg =   $get['products_images'];          
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
                                    
                                         <li>
                                            <a href="#" class="elevatezoom-gallery" data-update="" data-image="assets/img/product/productbig4.jpg" data-zoom-image="assets/img/product/productbig4.jpg">
                                                <img src="assets/img/product/productbig4.jpg" alt="zo-th-1" />
                                            </a>

                                        </li>
                                            <?php } ?>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form action="#">

                                    <h3><?= $getmyproduct['product_name'] ?></h3>


                                    <div class="price_box">
                                        <span class="old_price">Rs <?= $getmyproduct['product_mrp_price'] ?></span>
                                        <span class="current_price">Rs <?= $getmyproduct['product_sale_price'] ?></span>
                                    </div>
                                    <div class="product_desc">
                                    <?= $getmyproduct['product_description'] ?>
                                    </div>

                                    <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input min="1" max="100" value="1" type="number">
                                        <button class="button" type="submit">add to cart</button>

                                    </div>
                                    <div class=" product_d_action">
                                        <ul>
                                            <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                            <!-- <li><a href="#" title="Add to wishlist">+ Compare</a></li> -->
                                        </ul>
                                    </div>
                                    <div class="product_meta">
                                        <span>Category: <a href="#">Clothing</a></span>
                                    </div>

                                </form>
                                <div class="priduct_social">
                                    <ul>
                                        <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                        <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                        <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                        <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                        <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--product details end-->



                <!--product info start-->
                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">
                                <div class="product_info_button">
                                    <ul class="nav" role="tablist" id="nav-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Specification</a>
                                        </li>
                                        <!-- <li>
                                            <a class="active" data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                                        <div class="product_info_content">
                                        <?= $getmyproduct['product_specification'] ?>
                                        </div>
                                    </div>

                                    <!-- <div class="tab-pane fade" id="sheet" role="tabpanel">
                                        <div class="product_d_table">
                                            
                                        </div>
                                        <div class="product_info_content">
                                        <?= $getmyproduct['product_specification'] ?>
                                        </div>
                                    </div> -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product info end-->
            </div>



            <!--product area start-->
            <section class="product_area related_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products </h2>
                        </div>
                    </div>
                </div>
                 <div class="product_carousel product_style product_column5 owl-carousel">


                    <?php
                    $get_product = mysqli_query($conn , "SELECT * FROM `products` where `product_category`='$getproductcategoryid'");
                    while($get_pro_data = mysqli_fetch_assoc($get_product)){
                        $pid = $get_pro_data['product_id'];
                        $catmn = $get_pro_data['product_name'];
                        $prodetailid = $get_pro_data['product_id'];

                    ?>
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <?php
                                $get_pro = mysqli_query($conn , "SELECT * FROM `products_detail_image` where `products_ref_id`='$pid' LIMIT 1");
                                while($get_pro_data1 = mysqli_fetch_assoc($get_pro)){
                                ?>
                                <a class="primary_img" href="product-details.php?id=<?= $prodetailid ?>">
                                <?php 
                                 $mg = $get_pro_data1['products_images'];   
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
                                </a>
                                <?php } ?>
                                
                                
                                
                            </div>
                            <div class="product_content">
                                <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.php?id=<?= $prodetailid ?>"><?= substr($catmn,0,40) ?>..</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">Rs <?= $get_pro_data['product_mrp_price']?></span>
                                        <span class="current_price">Rs <?= $get_pro_data['product_sale_price']?></span>
                                    </div>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="Add to cart"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="cart.html" title="Add to cart"><i class="ion-android-favorite"></i></a>                                    
                                </div>
                            </div>
                        </figure>
                    </article>
<?php } ?>                   
                </div>

            </section>
            <!--product area end-->

        </div>
    </div>
<?php
include "include/footer.php";
?>