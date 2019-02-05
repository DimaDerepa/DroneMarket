<?php include(ROOT . '/views/layouts/header.php');?>
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="/" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="/blog/" class="s-text16">
			Blog
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
                <a href="/blog/category/<?php echo $article['category_id']?>" class="s-text16">
			<?php echo $blogCategories[$article['category_id']-1]['name'];?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $article['title']?>
		</span>
	</div>

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="/template/images/articles/<?php echo $article['id']?>/1.jpg" alt="IMG-BLOG">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $article['title'];?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $authors[$article['author_id']-1]['nickname'];?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php
                                                                                $date = new DateTime($article['date']);
                                                                                echo $date->format('j M, Y');
                                                                                ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $blogCategories[$article['category_id']-1]['name'];?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $comments[$article['category_id']-1]['COUNT(*)'];?> 
                                                                            Comment<?php if($comments[$article['category_id']-1]['COUNT(*)']==1){}else{echo 's';}?>
									</span>
								</div>

								<div class="p-b-25 blog_detail">
                                                                    <?php
                                                                      
                                                                    ?>
								</div>
							</div>

							
						</div>

						<!-- Leave a comment -->
						<form class="leave-comment">
							<h4 class="m-text25 p-b-14">
								Leave a Comment
							</h4>

							

							<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Comment..."></textarea>

							<div class="bo12 of-hidden size19 m-b-20">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name">
							</div>

							<div class="bo12 of-hidden size19 m-b-20">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email">
							</div>

						

							<div class="w-size24">
								<!-- Button -->
								<button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Post Comment
								</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Categories
						</h4>

						<ul>
                                                    <?php foreach ($blogCategories as $blogCategoryItem):?>
									  
							<li class="p-t-6 p-b-8 bo6">
								<a href="/blog/category/<?php echo $blogCategoryItem['id'];?>" class="s-text13 p-t-5 p-b-5">
									<?php echo $blogCategoryItem['name'];?>
								</a>
							</li>
                                                    <?php endforeach;?> 
						</ul>


						<h4 class="m-text23 p-t-65 p-b-34">
							Recomended Products
						</h4>

						<ul class="bgwhite">
                                                     <?php foreach ($products as $productsItem):?>
							<li class="flex-w p-b-20">
								<a href="/product/<?php echo $productsItem['id'];?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="/template/images/products/<?php echo $productsItem['id'];?>/1.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="/product/<?php echo $productsItem['id'];?>" class="s-text20">
                                                                            <b><?php echo $productsItem['firm'];?></b> <?php echo $productsItem['name'];?>
									</a>

									<span class="dis-block s-text17 p-t-6">
                                                                            <b><?php echo $productsItem['price'];?></b> $
									</span>
								</div>
							</li>

                                                    <?php endforeach;?> 
						</ul>

						

					
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include(ROOT . '/views/layouts/footer.php');?>