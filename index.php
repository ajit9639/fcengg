<?php
    include "./include/header.php";
    include "./include/sidebar_category.php";
    
    ?>

    <!--slider area start-->
    <section class="slider_section slider_s_one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                    <div class="swiper-container gallery-top">
                        <div class="slider_area swiper-wrapper">
                            
                            <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="assets/img/slider/slider1.jpg"></div>
                            <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="assets/img/slider/slider2.jpg"></div>
                            <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg"></div>
                            
                        </div>
                        <!-- Add Arrows -->

                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            
                            <div class="swiper-slide">
                                Eodem modo vel mattis ante nec
                            </div>
                            
                            <div class="swiper-slide">
                                Eodem modo vel mattis ante facilisis nec
                            </div>
                            <div class="swiper-slide">
                                Donec eu libero ac dapibus
                            </div>
                        </div>
                    </div>

                </div>
                <div class="s_banner col-lg-3 col-md-12">
                    <!--banner area start-->
                    <div class="sidebar_banner_area">

                    <?php
                    $get_sidebanner = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `sidebanner`"));
                    ?>
                        <figure class="single_banner mb-20">
                            <div class="banner_thumb">
                            <?php 
                                  $get_sidebanner1 = $get_sidebanner['sidebanner1'];
                                  echo '<img src="data:image/jpeg;base64,'.base64_encode($get_sidebanner1) .'" style=""/> '; ?>
                            </div>
                        </figure>

                        <figure class="single_banner mb-20">
                            <div class="banner_thumb">
                            <?php 
                                  $get_sidebanner2 = $get_sidebanner['sidebanner2'];
                                  echo '<img src="data:image/jpeg;base64,'.base64_encode($get_sidebanner2) .'" style=""/> '; ?>
                            </div>
                        </figure>

                        <figure class="single_banner mb-20">
                            <div class="banner_thumb">
                            <?php 
                                  $get_sidebanner3 = $get_sidebanner['sidebanner3'];
                                  echo '<img src="data:image/jpeg;base64,'.base64_encode($get_sidebanner3) .'" style=""/> '; ?>
                            </div>
                            </div>
                        </figure>

                        
                    </div>
                    <!--banner area end-->
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area mb-60 mt-50">
        <div class="container">
            <div class="shipping_inner">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping1.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h4>Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                </div>
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping2.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h4>Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                </div>
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping3.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h4>Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                </div>
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping4.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h4>Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                </div>
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping5.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h4>Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->

    <!--home section bg area start-->
    <div class="home_section_bg">

        <!--Categories product area start-->
        <div class="categories_product_area mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>All Categories</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="categories_product_inner">

                <?php
                $all_category = mysqli_query($conn , "SELECT * FROM `category`");
                while($get_category = mysqli_fetch_assoc($all_category)){
                    $mg = $get_category['cat_image']; 
                    $catmn = $get_category['cat_name'];
                ?>
                    <div class="single_categories_product">
                        <div class="categories_product_content">
                            <h4><a href=""> <?= substr($catmn,0,30) ?>..</a></h4>
                            <p> </p>
                        </div>
                        <div class="categories_product_thumb">
                            <a href="shop.html">
                           <?php                                                          
                           echo '<img src="data:image/jpeg;base64,'.base64_encode($mg) .'" style="width:100px;"/> '; ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        <!--Categories product area end-->

        <!--product area start-->
        <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>New Arrivals</h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="product_carousel product_style product_column5 owl-carousel">

                    <?php
                    $get_product = mysqli_query($conn , "SELECT * FROM `products`");
                    while($get_pro_data = mysqli_fetch_assoc($get_product)){
                        $pid = $get_pro_data['product_id'];
                        $pnm = $get_pro_data['product_name'];
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
                                    <h4 class="product_name"><a href="product-details.php?id=<?= $prodetailid ?>"><?= substr($pnm,0,40) ?>...</a></h4>
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
            </div>
        </div>
        <!--product area end-->

        <!--banner area start-->
        <div class="banner_area mb-25 mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="assets/img/bg/banner4.jpg" alt=""></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="assets/img/bg/banner5.jpg" alt=""></a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!--banner area end-->


       

        <!--product area start-->
        <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Safety & PPE Supplies.</h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="product_carousel product_style product_column5 owl-carousel">


                    <?php
                    $get_product = mysqli_query($conn , "SELECT * FROM `products` where `product_category`='24'");
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
            </div>
        </div>
        <!--product area end-->

        <!--banner area start-->
        <!-- <div class="banner_area banner_style2 mb-25 mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="assets/img/bg/banner6.jpg" alt=""></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="assets/img/bg/banner7.jpg" alt=""></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="assets/img/bg/banner8.jpg" alt=""></a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div> -->
        <!--banner area end-->




      <!--product area start-->
      <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Industrial Tools & Machinery</h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="product_carousel product_style product_column5 owl-carousel">


                    <?php
                    $get_product = mysqli_query($conn , "SELECT * FROM `products` where `product_category`='25'");
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
            </div>
        </div>
        <!--product area end-->




         <!--product area start-->
      <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>ELECTRICAL TOOLS & EQUIPMENT</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                    $get_product = mysqli_query($conn , "SELECT * FROM `products` where `product_category`='26'");
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
            </div>
        </div>
        <!--product area end-->


    <!--home section bg area end-->
    <?php
    include "./include/footer.php";
    ?>