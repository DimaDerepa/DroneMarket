<?php include(ROOT . '/views/layouts/header.php');?>
<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
                            <?php foreach ($promotions as $promotionItem):?>
				<div class="item-slick1 item1-slick1" style="background-image: url(/template/images/promotions/<?php echo $promotionItem['id'];?>.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo $promotionItem['small_line'];?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo $promotionItem['big_line'];?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="/product/<?php echo $promotionItem['product'];?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								<?php echo $promotionItem['button_content'];?>
							</a>
						</div>
					</div>
				</div>
                            <?php endforeach;?>
				

			</div>
		</div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
                                         
					<div class="block1 hov-img-zoom pos-relative m-b-30">
                                            <picture>
                                                <source type="image/jpg" srcset="/template/images/categories/<?php echo $categories[0]['id'];?>.jpg"  >
                                                <img type="image/webp" src="/template/images/categories/<?php echo $categories[0]['id'];?>.webp"  alt="IMG-BENNER">
                                            </picture>
						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="/category/<?php echo $categories[0]['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4 but1avt">
								<?php echo $categories[0]['name'];?>
							</a>
						</div>
					</div>
                                  
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						
                                            <picture>
                                                <source type="image/jpg" srcset="/template/images/categories/<?php echo $categories[1]['id'];?>.jpg"  >
                                                <img type="image/webp" src="/template/images/categories/<?php echo $categories[1]['id'];?>.webp"  alt="IMG-BENNER">
                                            </picture>
						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="/category/<?php echo $categories[1]['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $categories[1]['name'];?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
					
                                            <picture>
                                                <source type="image/jpg" srcset="/template/images/categories/<?php echo $categories[2]['id'];?>.jpg"  >
                                                <img type="image/webp" src="/template/images/categories/<?php echo $categories[2]['id'];?>.webp"  alt="IMG-BENNER">
                                            </picture>

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="/category/<?php echo $categories[2]['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $categories[2]['name'];?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						
                                            <picture>
                                                <source type="image/jpg" srcset="/template/images/categories/<?php echo $categories[3]['id'];?>.jpg"  >
                                                <img type="image/webp" src="/template/images/categories/<?php echo $categories[3]['id'];?>.webp"  alt="IMG-BENNER">
                                            </picture>
						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="/category/<?php echo $categories[3]['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $categories[3]['name'];?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
                                            
                                                 <picture>
                                                    <source type="image/jpg" srcset="/template/images/categories/<?php echo $categories[4]['id'];?>.jpg"  >
                                                    <img type="image/webp" src="/template/images/categories/<?php echo $categories[4]['id'];?>.webp"  alt="IMG-BENNER">
                                                </picture>
						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="/category/<?php echo $categories[4]['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $categories[4]['name'];?>
							</a>
						</div>
					</div>

					<!-- block2 -->
					<div class="block2 wrap-pic-w pos-relative m-b-30">
                                            
						<img src="/template/images/icons/bg-01.ico" alt="IMG">

						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
                                                            Sign up <br> in community
							</h4>

							<p class="t-center w-size4">
								We are more than simple online-store, we are community. Become part of us! 
							</p>

							<div class="w-size2 p-t-25">
								<!-- Button -->
								<a href="/user/registration" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Sign Up
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Recomended Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                                    <?php foreach ($products as $productsItem):?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
                                                        <div class="block2-img wrap-pic-w of-hidden pos-relative  <?php if($productsItem['sale']==1){echo 'block2-labelsale';}?>">
								
                                                                 <picture>
                                                                    <source type="image/jpg" srcset="/template/images/products/<?php echo $productsItem['id'];?>/1.jpg">
                                                                    <img type="image/webp" src="/template/images/products/<?php echo $productsItem['id'];?>/1.webp"  alt="IMG-BENNER">
                                                                </picture>
								<div class="block2-overlay trans-0-4">
									

									 <a class="add-to-cart" href="/cart/add/<?php echo $productsItem['id']['id'];?>" data-id="<?php echo $productsItem['id'];?>"><div class="block2-btn-addcart w-size1 trans-0-4">
                                                                                        <!-- Button -->
                                                                                       
                                                                                        <button  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                             
                                                                                                Add to Cart
                                                                                        </button>
                                                                                </div>
                                                                                                                                                                    </a>

                                                                                
								</div>
							</div>

							<div class="block2-txt p-t-5">
								<a href="/product/<?php echo $productsItem['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                                                                    <b><?php echo $productsItem['firm'];?></b>  <?php echo $productsItem['name'];?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									<?php  if(isset($productsItem['sale'])){echo  '<s style="color:red;"><b>'.$productsItem['price'].'</b>$</s> <b>'.$productsItem['new_price'].'</b>$';}
                                                                            else{echo '<b>'.$productsItem['price'].'</b>$';}?> 
								</span>
							</div>
						</div>
					</div>
                                    <?php endforeach;?>
					
				</div>
			</div>

		</div>
	</section>

	<!-- Banner2 -->
	<section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
                   <h3 class="m-text5 t-center m-b-24">
					HOT SALES
				</h3>
			<div class="row">
                           
                            <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15  ararat" >
                                     <a href="/product/<?php echo $sales[0]['prod_id'];?>" class="dis-block s-text10 p-b-5">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm pesgo">
						
                                                <picture>
                                                    <source type="image/jpg" srcset="/template/images/sales/<?php echo $sales[0]['sales_id'];?>.jpg" >
                                                    <img type="image/webp" src="/template/images/sales/<?php echo $sales[0]['sales_id'];?>.webp"   alt="IMG-BENNER">
                                                </picture>

						
					</div>
                                                                     </a>

				</div>
                               
				 <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15 " >
                                     <a href="/product/<?php echo $sales[1]['prod_id'];?>" class="dis-block s-text10 p-b-5">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm pesgo">
					 <picture>
                                            <source type="image/jpg" srcset="/template/images/sales/<?php echo $sales[1]['sales_id'];?>.jpg" >
                                            <img type="image/webp" src="/template/images/sales/<?php echo $sales[1]['sales_id'];?>.webp"   alt="IMG-BENNER">
                                        </picture>

						
					</div>
                                                                     </a>

				</div>
                                
			</div>
		</div>
	</section>


	<!-- Blog -->
       
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Our Blog
				</h3>
			</div>

			<div class="row">
                            <?php foreach ($articles as $articleItem):?>
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
                                         
					<div class="block3">
						<a href="/article/<?php echo $articleItem['id'];?>" class="block3-img dis-block hov-img-zoom">
                                                    <div class="blog_image_main m-l-r-auto">
                                                       
                                                         <picture class="blog_image_main_photo" >
                                                            <source type="image/jpg" srcset="/template/images/articles/<?php echo $articleItem['id'];?>.jpg" >
                                                            <img type="image/webp" src="/template/images/articles/<?php echo $articleItem['id'];?>.webp"    alt="IMG-BENNER">
                                                        </picture>
                                                    </div>
                                                    
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="/article/<?php echo $articleItem['id'];?>" class="m-text11">
									<?php echo $articleItem['title'];?>
								</a>
							</h4>

							


						</div>
					</div>
				</div>
                                <?php endforeach;?>
				
			</div>
		</div>
	</section>

	<!-- Instagram -->
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ follow us on Instagram
			</h3>
		</div>

		<div class="flex-row sobaka">
			<?php foreach($instagramPhotos as $insta):?>
			<div class="block4 wrap-pic-max-w ">
				<?php echo $insta['photo'];?>

				<a href="<?php echo $insta['link'];?>" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2"><?php echo $insta['likes'];?></span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							<?php echo mb_substr($insta['description'], 0, 120); ?>...
						</p>

						
					</div>
				</a>
			</div>
                        <?php endforeach;?>
		
		</div>
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Satisfied buyers
				</h4>

				<span class="s-text11 t-center">
					Only real comments 
				</span>
			</div>
		</div>
	</section>
<?php include(ROOT . '/views/layouts/footer.php');?>