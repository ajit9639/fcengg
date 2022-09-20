
                <!--header bottom satrt-->
                <div class="header_bottom">
                    <div class="row align-items-center">
                        <div class="column1 col-lg-3 col-md-6 col-12">
                            <div class="Offcanvas_menu_wrapper">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                            </div>

                            <div class="categories_menu">
                                <div id="myDIV" class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                                <div class="categories_title">
                                    <h2 class="categori_toggle">ALL CATEGORIES</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                    <?php
                                    $category = mysqli_query($conn, "SELECT * FROM `category`");
                                    while($get_category = mysqli_fetch_assoc($category)){
                                        $catnm = $get_category['cat_name'];
                                        $categry_id = $get_category['cat_id'];
                                        ?>
                                        <li class="menu_item_children"><a href="#"><?= $catnm?> <i class="fa fa-angle-right"></i></a>
                                            <ul class="categories_mega_menu">

                                                <li class="menu_item_children">
                                                    <a href="#"><?=  $catnm?></a>
                                                    <ul class="categorie_sub_menu">
                                                    <?php 
                                                    
                                                    $subcategory = mysqli_query($conn, "SELECT * FROM `subcategory` where `category_name`='$categry_id'");
                                                   while($get_subcategory = mysqli_fetch_assoc($subcategory)){?>
                                                        <li><a href="#"><?= $get_subcategory['subcategory_name']?></a></li>
                                                       <?php } ?>
                                                    </ul>
                                                </li>

                                               
                                            </ul>
                                        </li>
                                       
                                       <?php } ?>
                                        <!-- <li class="hidden"><a href="#">New Sofas</a></li> -->

                                      
                                        <!-- <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header bottom end-->
            </div>
        </div>
    </header>
    <!--header area end-->
   