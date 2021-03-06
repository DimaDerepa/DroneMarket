<?php include(ROOT . '/views/layouts/header.php');?>
        <section class="bg-title-page flex-col-c-m" style="background-image: url(/template/images/categories/<?php if($category_id==NULL){echo 'all';}else{echo '2'.$category_id;}?>.jpg);">
                
                
        </section>


        <!-- Content page -->
        <section class="bgwhite p-t-55 p-b-65">
                <div class="container">
                        <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                        <div class="leftbar p-r-20 p-r-0-sm">
                                                <!--  -->
                                                <h4 class="m-text14 p-b-7">
                                                        Categories
                                                </h4>

                                                <ul class="p-b-54">
                                                        <li class="p-t-4">
                                                                <a href="/shop/" class="s-text13 <?php if($category_id==NULL){ echo'active';}?>">
                                                                        All
                                                                </a>
                                                        </li>
                                                        <?php foreach ($categories as $categoryItem):?>
                                                            <li class="p-t-4">
                                                                <a class="s-text13 
                                                                    <?php if(isset($category_id)){
                                                                            if ($category_id==$categoryItem['id']){
                                                                    echo'active';}} ?>" 
                                                                   href="/category/<?php echo $categoryItem['id'];?>"> 
                                                                                                
                                                                    <?php echo $categoryItem['name'];?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach;?> 
                                                </ul>

                                                <!--  -->
                                                <h4 class="m-text14 p-b-32">
                                                        Filters
                                                </h4>

                                                <div class="filter-price p-t-22 p-b-50 bo3">
                                                        <div class="m-text15 p-b-17">
                                                                Price
                                                        </div>

                                                        <div class="wra-filter-bar">
                                                                <div id="filter-bar"></div>
                                                        </div>

                                                        <div class="flex-sb-m flex-w p-t-16">
                                                            <form method="post" id="filters" name="form"></form>

                                                                <div class="s-text3 p-t-10 p-b-10">
                                                                        Range: $<span id="value-lower"><?php echo $productsByPrice['MIN(price)'];?></span> - $<span id="value-upper"><?php echo $productsByPrice['MAX(price)'];?></span>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="filter-price p-t-22 p-b-50 bo3">
                                                        <div class="m-text15 p-b-17">
                                                                Firm
                                                        </div>
                                                    <?php foreach($productsByFirm as $firmItem):?>
                                                    <input name="sosi" form="filters" type="checkbox" value="<?php echo $firmItem['firm'];?>" class="checkbox" id="checkbox <?php echo $firmItem['firm'];?>">
                                                    <label for="checkbox <?php echo $firmItem['firm'];?>"><?php echo $firmItem['firm'];?>  <b>(<?php echo $firmItem['count'];?>)</b></label><br>
                                                     <?php endforeach; ?>
                                                     
                                                        
                                                </div>

                                                <div class="w-size11">
                                                                        <!-- Button -->
                                                                        <input type="submit" value="filter" form="filters" class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                                                               
                                                                      
                                                                </div>
<?php $z=$_POST['sosi'];
echo $z;?>
                                                <div class="search-product pos-relative bo4 of-hidden">
                                                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                                                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                </div>
                                        </div>
                                </div>

                                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                                        <!--  -->
                                        <div class="flex-sb-m flex-w p-b-35">
                                                <div class="flex-w">
                                                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                                                <select class="selection-2" name="sorting">
                                                                        <option>Default Sorting</option>
                                                                        <option>Popularity</option>
                                                                        <option>Price: low to high</option>
                                                                        <option>Price: high to low</option>
                                                                </select>
                                                        </div>

                                                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                                                <select class="selection-2" name="sorting">
                                                                        <option>Price</option>
                                                                        <option>$0.00 - $50.00</option>
                                                                        <option>$50.00 - $100.00</option>
                                                                        <option>$100.00 - $150.00</option>
                                                                        <option>$150.00 - $200.00</option>
                                                                        <option>$200.00+</option>

                                                                </select>
                                                        </div>
                                                </div>

                                                <span class="s-text8 p-t-5 p-b-5">
                                                        Showing 1–12 of 16 results
                                                </span>
                                        </div>

                                        <!-- Product -->
                                        <div class="row">
                                            <?php foreach ($allProducts as $allProductsItem): ?>
                                                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                                        <!-- Block2 -->
                                                        <div class="block2">
                                                                <div class="block2-img wrap-pic-w of-hidden pos-relative 
                                                                     <?php 
                                                                     if($allProductsItem['sale']==1){echo 'block2-labelsale';}
                                                                      ?>">
                                                                        <img src="/template/images/products/<?php echo $allProductsItem['id'];?>/1.jpg" alt="IMG-PRODUCT">

                                                                        <div class="block2-overlay trans-0-4">
                                                                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                                                </a>

                                                                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                                                                        <!-- Button -->
                                                                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                                Add to Cart
                                                                                        </button>
                                                                                </div>
                                                                        </div>
                                                                </div>

                                                                <div class="block2-txt p-t-20">
                                                                        <a href="/product/<?php echo $allProductsItem['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                                                                            <b><?php echo $allProductsItem['firm'];?></b> <?php echo $allProductsItem['name'];?>
                                                                        </a>

                                                                        <span class="block2-price m-text6 p-r-5">
                                                                            <b><?php echo $allProductsItem['price'];?></b> $
                                                                        </span>
                                                                </div>
                                                        </div>
                                                </div>
                                            <?php endforeach;?>
                                                
                                        </div>

                                        <!-- Pagination -->
                                        <div id="pagination">
                                            <?php echo $pagination->get();?>
                                        </div>
                                </div>
                            
                        </div>
                  
                </div>
               
        </section>
        <?php include(ROOT . '/views/layouts/footer.php');?>