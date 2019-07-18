<?php include(ROOT . '/views/layouts/header.php');?>
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-10 p-l-15-sm">
		<a href="/" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="/category/<?php echo $product['category_id']; ?>" class="s-text16">
			<?php echo $categories[$product['category_id']-1]['name']; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a  class="s-text16">
			<?php echo $product['firm']; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $product['name']; ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-5 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-15 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="/template/images/products/<?php echo $product['id']; ?>/1.jpg">
							<div class="wrap-pic-w">
								<img src="/template/images/products/<?php echo $product['id']; ?>/1.jpg" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="/template/images/products/<?php echo $product['id']; ?>/2.jpg">
							<div class="wrap-pic-w">
								<img src="/template/images/products/<?php echo $product['id']; ?>/2.jpg" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="/template/images/products/<?php echo $product['id']; ?>/3.jpg">
							<div class="wrap-pic-w">
								<img src="/template/images/products/<?php echo $product['id']; ?>/3.jpg" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
                                    <b><?php echo $product['firm']; ?></b>  <?php echo $product['name']; ?>
				</h4>

				<span class="m-text17 ">
                                
                                      <?php  if(isset($product['sale'])){echo  '<s style="color:red;"><b>'.$product['price'].'</b>$</s> <b>'.$product['new_price'].'</b>$';}
                                                                            else{echo '<b>'.$product['price'].'</b>$';}
                                                                            ?>
				</span>

				

				<!--  -->
				<div class="p-t-33 p-b-60">
				
					
                                    <?php if($product['in_stock']==1){  ?>
					<div class="flex-l-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<a class="add-to-cart" href="/cart/add/<?php echo $product['id'];?>" data-id="<?php echo $product['id'];?>">
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
                                                                </a>
							</div>
						</div>
					</div>
                                    <?php }else{echo 'Sorry, this product isn\'t avaliable now(';} ?>
                                    
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-10">Code: <?php echo $product['code']; ?></span>
					<span class="s-text8 m-r-10">Category: <?php echo $categories[$product['category_id']-1]['name']; ?></span>
                                        <span class="s-text8"><img src="/template/images/icons/views.png" id="view_icon" alt="views"> <?php echo $product['views']; ?></span>
				</div>

				<!--  -->
				
			</div>
                    
		</div>
                    <?php if($product['category_id']==4 || $product['category_id']==5){}
                    else{   $rating=round((($product['portability']+$product['quality']+$product['ease_of_use']+$product['speed'])/4),2);
                            $easeOfUsePercent=round(($product['ease_of_use']*10),0);
                            $portabilityPercent=round(($product['portability']*10),0);
                            $ratingPercent=round(($rating*10),0);
                            $speedPercent=round(($product['speed']*10),0);
                            $qualityPercent=round(($product['quality']*10),0);
                                            echo '
                        <div class="flex-w flex-sb m-t-50">
                            <div class="w-size13 flex-m flex-w p-b-60 m-l-r-auto lolo">
                                <div class="w-size9 flex-m flex-w m-l-r-auto">
                                    <section >
              
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="220" height="220" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart__circle" stroke="#dd7b3a" stroke-width="2" stroke-dasharray="';echo $ratingPercent;echo ',100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <g class="circle-chart__info">
                                              <text class="circle-chart__percent" x="16.91549431" y="13" alignment-baseline="central" text-anchor="middle" font-size="8">
                                                 ';echo $rating;echo '
                                              </text>
                                              <text class="circle-chart__subline" x="16.91549431" y="20" alignment-baseline="central" text-anchor="middle" font-size="7">Rating</text>
                                            </g>
                                        </svg>
                                    </section>
                                </div>
                                <div class="w-size9 flex-m flex-w lolo">
                                    <section >
                                       
                                       <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                           <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <circle class="circle-chart__circle" stroke="#dd7b3a" stroke-width="2" stroke-dasharray="'; echo $qualityPercent;echo',100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <g class="circle-chart__info">
                                             <text class="circle-chart__percent" x="16.91549431" y="13" alignment-baseline="central" text-anchor="middle" font-size="8">
                                                  '; echo $product['quality']; echo'
                                             </text>
                                             <text class="circle-chart__subline" x="16.91549431" y="20" alignment-baseline="central" text-anchor="middle" font-size="4">Quality</text>
                                           </g>
                                       </svg>
                                   </section>

                                    <section style="margin-left:4%;">
                       
                                       <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                           <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <circle class="circle-chart__circle" stroke="#dd7b3a" stroke-width="2" stroke-dasharray="';echo $easeOfUsePercent;echo',100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <g class="circle-chart__info">
                                             <text class="circle-chart__percent" x="16.91549431" y="13" alignment-baseline="central" text-anchor="middle" font-size="8">
                                                   ';echo $product['ease_of_use'];echo '
                                             </text>
                                             <text class="circle-chart__subline" x="16.91549431" y="20" alignment-baseline="central" text-anchor="middle" font-size="4">Ease of use</text>
                                           </g>
                                       </svg>
                                   </section>

                                   <section>
                                     
                                       <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                           <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <circle class="circle-chart__circle" stroke="#dd7b3a" stroke-width="2" stroke-dasharray="';echo $speedPercent;echo',100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <g class="circle-chart__info">
                                             <text class="circle-chart__percent" x="16.91549431" y="13" alignment-baseline="central" text-anchor="middle" font-size="8">
                                                   '; echo $product['speed'];echo '
                                             </text>
                                             <text class="circle-chart__subline" x="16.91549431" y="20" alignment-baseline="central" text-anchor="middle" font-size="4">Speed</text>
                                           </g>
                                       </svg>
                                   </section>

                                    <section  style="margin-left:4%;">
                                       <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                           <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <circle class="circle-chart__circle" stroke="#dd7b3a" stroke-width="2" stroke-dasharray="'; echo $portabilityPercent;echo ',100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                           <g class="circle-chart__info">
                                             <text class="circle-chart__percent" x="16.91549431" y="13" alignment-baseline="central" text-anchor="middle" font-size="8">
                                                   '; echo $product['portability'];echo '
                                             </text>
                                             <text class="circle-chart__subline" x="16.91549431" y="20" alignment-baseline="central" text-anchor="middle" font-size="4">Portability</text>
                                           </g>
                                       </svg>
                                   </section>
                                </div>
                            </div>
                            <div class="w-size14 flex-m flex-w p-b-60 specs_wrapper">
                                
                                <div class="specs">
                                    <img src="/template/images/icons/time.png" class="productSpecsLogo">
                                    <span class="m-l-10">Flight time<br>
                                    <b>';echo $product['flight_time']; echo' minutes</b></span>
                                </div>
                                <div class="specs">
                                    <img src="/template/images/icons/range.png" class="productSpecsLogo">
                                    <span  class="m-l-10">Control range<br>
                                     <b>';echo $product['control_range'];echo' meters</b></span>
                                </div>
                                <div class=" specs">
                                    <img src="/template/images/icons/photo.png" class="productSpecsLogo">
                                    <span  class="m-l-10">Camera resolution<br>
                                        <b>';echo $product['camera_resolution'];echo'</b></span>
                                </div>
                                <div class="specs">
                                    <img src="/template/images/icons/video.png" class="productSpecsLogo">
                                    <span  class="m-l-10">Video resolution<br>
                                     <b>'; echo $product['video_resolution']; echo'</b></span>
                                </div>
                                <div class="specs">
                                    <img src="/template/images/icons/slow-mo.png" class="productSpecsLogo">
                                    <span  class="m-l-10">Slow-mo resolution<br>
                                     <b>'; echo $product['slow_resolution']; echo '</b></span>
                                </div>
                                <div class="specs">
                                    <img src="/template/images/icons/rotate.png" class="productSpecsLogo">
                                    <span  class="m-l-10">Gimbal<br>
                                     <b>'; echo $product['gimbal']; echo'</b></span>
                                </div>
                                
                            </div>
                    </div>';}?>
                                    
            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
                                            Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<br><br><br><?php echo $product['description']; ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
						Specifications
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
                                            
                                                <div class="flex-w flex-sb ">
                                                    <div class="w-size13 respon5">
                                                        <p class="s-text8">
                                                            <br><br><br><?php echo $product['specification']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="w-size14 respon5">
                                                        <?php
                                                        for ($i = 1; $i <= 15; $i++){
                                                             $filename ='/template/images/products/'.$product['id'].'/add'.$i.'.jpg';
                                                             $filenameR=ROOT . $filename;

                                                             if (file_exists($filenameR)) {
                                                                 echo '<img src="'.$filename.'" id="additional_photo" >';
                                                             } 
                                                             else {                                                                
                                                                break;
                                                                
                                                             }
                                                        }
                                                        
                                                        ?>
                                                    </div>
                                                </div>
                                          
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
						Comments 
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
                                                  
                                            <?php foreach($commentsInfo as $value):?>
                                            <div class="comment_wrapper m-b-20">
                                                <span class="comment_info m-l-8"><?php if(isset($_SESSION['user']) && $value['author_id']==$_SESSION['user']){
                                                    echo '<form method="post"><input class="delete_comment" type="submit" name="delete_comment" value="Delete comment"><input type="hidden" name="id" value="'.$value['id'].'"></form>';
                                                    
                                                }?></span>
                                                <span class="comment_title"><?php echo $value['title'];?></span>
                                                <p class="comment_text"><?php echo $value['text'];?></p>
                                                <div class=" comment_info">
                                                <span class="comment_date"><?php echo $value['date'];?></span>
                                                 <span class="comment_author m-l-8">by <?php echo $authors[$value['author_id']];?></span>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                             <?php if($username!=NULL): ?>
						<!-- Leave a comment -->
                                                <form method="post" >
							<h4 class="m-text25 p-b-14">
								Leave a Comment
							</h4>

							<div class="bo12 of-hidden   m-b-20 w-full">
								<input class="sizefull s-text7 p-b-18 p-t-18 p-l-18 p-r-18" type="text" name="comment_title" placeholder="Title">
							</div>

							<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment_text" placeholder="Comment..."></textarea>

							

						

							<div class="w-size24">
								<!-- Button -->
                                                                <input type="submit" name="submit_comment" value="Post Comment" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									
							</div>
						</form>
                                                <?php else:?>
                                                <a  href="/user/login"><b>LOGIN</b></a> for leave your comment.
                                                <?php endif;?>
					</div>
				</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					RECOMENDED PRODUCTS
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                                    <?php foreach ($products as $productsItem):?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="/template/images/products/<?php echo $productsItem['id'];?>/1.jpg" alt="IMG-PRODUCT">

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
								<a href="/product/<?php echo $productsItem['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                                                                    <b><?php echo $productsItem['firm'];?></b>  <?php echo $productsItem['name'];?>
								</a>

								<span class="block2-price m-text6 p-r-5">
                                                                    <b><?php echo $productsItem['price'];?></b> $
								</span>
							</div>
						</div>
					</div>
                                    <?php endforeach;?>
					
				</div>
			</div>

		</div>
	</section>
<?php include(ROOT . '/views/layouts/footer.php');?>