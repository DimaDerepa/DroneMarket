<?php include(ROOT . '/views/layouts/header.php');?>
        <section class="bg-title-page flex-col-c-m effect7" style="background-image: url(/template/images/categories/21.jpg);">
                
                <h2 class="xl-text3 t-center">
			<?php if(!isset($category_id) || $category_id==NULL){echo 'Shop';}else{echo $categories[$category_id-1]['name'];}?>
		</h2>
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
                                                                <a href="/category/all" class="s-text13 <?php if(!isset($category_id) || $category_id==NULL){ echo'active';}?>">
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
                                                     <form method="post" action="/category/searched">
                                                <div class="search-product pos-relative bo4 of-hidden m-b-50">
                                                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="searched_products" placeholder="Search Products...">

                                                        <button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                </div>
                                                </form>
                                                <!--  -->
                                                <h4 class="m-text14 p-b-32">
                                                        Filters
                                                </h4>
                                               
                                                <div class="filter-price p-t-22 p-b-50 bo3">
                                                        <div class="m-text15 p-b-17">
                                                                Price
                                                        </div>

                                                        <div class="wra-filter-bar">
                                                            <input type="text" form="filters" class="js-range-slider" name="my_range" value=""
                                                                   data-min="<?php echo min($priceRange);?>"
                                                                   data-max="<?php echo max($priceRange);?>"
                                                                   data-from="<?php if(isset($filt) && $_POST['my_range']!=NULL){$dataRange= explode(";", $_POST['my_range']);echo $dataRange[0];}elseif(isset($filt) && $_SESSION['filters']['my_range']!=NULL){$dataRangeS=explode(";", $_SESSION['filters']['my_range']);echo $dataRangeS[0];}else{echo min($priceRange);}?>"
                                                                    data-to="<?php if(isset($filt) && $_POST['my_range']!=NULL){$dataRange= explode(";", $_POST['my_range']);echo $dataRange[1];}elseif(isset($filt) && $_POST['my_range']==NULL && $_SESSION['filters']['my_range']!=NULL){$dataRangeS=explode(";", $_SESSION['filters']['my_range']);echo $dataRangeS[1];}else{echo max($priceRange);}?>" />
                                                                    

                                                        </div>

                                                        <div class="flex-sb-m flex-w p-t-16">
                                                            <form method="post" action="<?php if($category_id==NULL){$filterURL=substr($_SERVER['REQUEST_URI'],0,13);} else {$filterURL=substr($_SERVER['REQUEST_URI'],0,11);}echo $filterURL.'/filtered'?>" id="filters" name="form">

                                                                
                                                                </form>
                                                        </div>
                                                </div>
                                                <div class="filter-price p-t-22 p-b-50 bo3">
                                                        <div class="m-text15 p-b-17">
                                                                Firm
                                                        </div>
                                                    <?php 
                                                    $i=0;
                                                    foreach($productsByFirm as $firmItem):?>
                                                    <input name="firm <?php echo $i;$i++;?>" form="filters" type="checkbox" value="<?php echo $firmItem['firm'];?>" class="checkbox" id="checkbox <?php echo $firmItem['firm'];?>" <?php if($_POST!=NULL && isset($filt) && in_array($firmItem['firm'],$_POST)){echo 'checked';}elseif($_POST==NULL && isset($filt) && $_SESSION['filters']!=NULL && in_array($firmItem['firm'],$_SESSION['filters'])){    echo 'checked';}?>>
                                                    <label for="checkbox <?php echo $firmItem['firm'];?>"><?php echo $firmItem['firm'];?>  <b>(<?php echo $firmItem['count'];?>)</b></label><br>
                                                     <?php endforeach; ?>
                                                     
                                                        
                                                </div>

                                                <div class="w-size11">
                                                                        <!-- Button -->
                                                                        <input type="submit" value="filter" form="filters"  class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4 FILTSUBMIT">
                                                          
                                                                </div>
                                                
                                        </div>
                                </div>

                                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                                        <!--  -->
                                        <div class="flex-sb-m flex-w p-b-35">
                                                <div class="flex-w">
                                                    <?php $bichuha; if(isset($_SESSION['filters']) && $_SESSION['filters']!=NULL && isset($filt) && $_POST==NULL){$bichuha=$_SESSION['filters']['sorting'];}elseif(isset($filt) && $_POST!=NULL){$bichuha=$_POST['sorting'];}else{}?>
                                                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                                            <select form="filters" class="selection-2" name="sorting">
                                                                <option value="id" <?php if(isset($bichuha) && $bichuha=='id'){echo 'selected';}?>>Default Sorting</option>
                                                                        <option value="views" <?php if(isset($bichuha) && $bichuha=='views'){echo 'selected';}?>>Popularity</option>
                                                                        <option value="price"  <?php if(isset($bichuha) && $bichuha=='price'){echo 'selected';}?> >Price</option>
                                                                       
                                                                </select>
                                                        </div>
                                                    <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                                         <?php $sosuha; if(isset($_SESSION['filters']) && $_SESSION!=NULL && isset($filt) && $_POST==NULL){$sosuha=$_SESSION['filters']['order'];}elseif(isset($filt) && isset($_POST['order']) && $_POST!=NULL){$sosuha=$_POST['order'];}?>
								<select form="filters" class="selection-2" name="order">
                                                                    <option value="DESC" <?php if(isset($sosuha) && $sosuha=='DESC'){echo 'selected';}else{}?>>Descending</option>
                                                                        <option value="ASC" <?php if(isset($sosuha) && $sosuha=='ASC'){echo 'selected';}else{}?>>Ascending</option>
									
									

								</select>
							</div>


                                                </div>

                                                <span class="s-text8 p-t-5 p-b-5">
                                                    Showing <?php echo (($page-1)*Product::SHOW_BY_DEFAULT)+1;?>–<?php $lastProd=$page*Product::SHOW_BY_DEFAULT; if($lastProd<$total){echo $lastProd;}else{echo $total;}?> of <?php echo $total; ?> results
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
                                                                                

                                                                                <?php if($allProductsItem['in_stock']==0){
                                                                                    echo '<br><br><span class="m-text9 ">Not avaliable</span>';
                                                                                }
                                                                                else{?><a class="add-to-cart" href="/cart/add/<?php echo $allProductsItem['id'];?>" data-id="<?php echo $allProductsItem['id'];?>"><div class="block2-btn-addcart w-size1 trans-0-4">
                                                                                        <!-- Button -->
                                                                                       
                                                                                        <button  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                             
                                                                                                Add to Cart
                                                                                        </button>
                                                                                </div>
                                                                                                                                                                    </a>

                                                                                <?php }?>
                                                                        </div>
                                                                </div>

                                                                <div class="block2-txt p-t-20">
                                                                        <a href="/product/<?php echo $allProductsItem['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                                                                            <b><?php echo $allProductsItem['firm'];?></b> <?php echo $allProductsItem['name'];?>
                                                                        </a>
                                                                    <?php if($allProductsItem['in_stock']==0){
                                                                        echo '<span class="m-text1489">'.$allProductsItem['price'].'$</span>';
                                                                    }else{?>
                                                                        <span class="block2-price m-text6 p-r-5">
                                                                            <?php  if(isset($allProductsItem['sale'])){echo  '<s style="color:red;"><b>'.$allProductsItem['price'].'</b>$</s> <b>'.$allProductsItem['new_price'].'</b>$';}
                                                                            else{echo '<b>'.$allProductsItem['price'].'</b>$';}
                                                                            ?>
                                                                            
                                                                        </span>
                                                                    <?php }?>
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