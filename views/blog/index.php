<?php include(ROOT . '/views/layouts/header.php');?>
	<section class="bg-title-page blog_bg p-t-40 p-b-50 flex-col-c-m">
		<h2 class="l-text2 t-center">
			Blog
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
                                                <?php foreach ($articles as $articlesItem):?>
						<div class="item-blog p-b-80">
							<a href="/blog/<?php echo $articlesItem['id'];?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="/template/images/articles/<?php echo $articlesItem['id'];?>/1.jpg" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									<?php
                                                                        $date = new DateTime($articlesItem['date']);
                                                                        echo $date->format('j M, Y');
                                                                        ?>
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="/blog/<?php echo $articlesItem['id'];?>" class="m-text24">
										<?php echo $articlesItem['title'];?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $authors[$articlesItem['author_id']-1]['nickname'];?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $blogCategories[$articlesItem['category_id']-1]['name'];?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
                                                                                <?php echo $comments[$articlesItem['category_id']-1]['COUNT(*)'];?> 
                                                                            Comment<?php if($comments[$articlesItem['category_id']-1]['COUNT(*)']==1){}else{echo 's';}?>
									</span>
								</div>

								<p class="p-b-12">
									<?php echo mb_strimwidth($articlesItem['text'], 0, 400, "...");?>
								</p>

								<a href="/blog/<?php echo $articlesItem['id'];?>" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
                                                <?php endforeach;?>

						

					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
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
   
						<!-- Featured Products -->
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