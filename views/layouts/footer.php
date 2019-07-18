
<?php include_once ROOT . '/config/contacts.php';?>
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-10 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
                                            Any questions? Let us know in store at <br> <?php echo $contacts['adress']; ?><br> Or call us on <?php echo $contacts['phone']; ?>
					</p>

					<div class="flex-m p-t-30">
						<a href="<?php echo $contacts['facebook']; ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?php echo $contacts['instagram']; ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="<?php echo $contacts['youtube']; ?>" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
                                    <?php foreach ($categories as $categoryItem):?>
                                        <li class="p-b-9">
						<a href="/category/<?php echo $categoryItem['id'];?>"
                                                   class="s-text7">
                                                    <?php echo $categoryItem['name'];?>
						</a>
					</li>
                                   <?php endforeach;?>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Blog
				</h4>

				<ul>
                                    <?php foreach($blogCategories as $blogItem):?>
					<li class="p-b-9">
						<a href="/blog/<?php echo $blogItem['id'];?>" class="s-text7">
							<?php echo $blogItem['name'];?>
						</a>
					</li>
                                    <?php endforeach;?>    
					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							About us
						</a>
					</li>

					<li class="p-b-9">
						<a href="/contact" class="s-text7">
							Contact us
						</a>
					</li>

					<li class="p-b-9">
						<a href="/shipping" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="/faqs" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

                            <form method="post" action="#">
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
                                                <input type="submit" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4"  name="Subscribe" value="Subscribe">
							
					
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
	

			<div class="t-center s-text8 p-t-10">
				Copyright © 2018 All rights reserved.
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/template/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.block2-name').text();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').text();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').text();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
        <script>
            $(document).ready(function(){
                
                
                $("[id=cart-count]").html(function(){
                    var $z=<?php if(isset($_SESSION['products'])){ echo array_sum($_SESSION['products']);}else{echo 0;}?>; 
                    return $z;
                });
               
                   
                $(".add-to-cart").click(function (){
                    var id=$(this).attr("data-id");
                    $.post("/cart/add/"+id, {}, function (data){
                        
                        $("[id=cart-count]").html(data);
                        $("#cart_div").load(location.href+" #cart_div>*","");
                       
                      
                         
                    });
                    return false;
                });
               
               
            });
                  
        </script>
  
        <script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
<script>  $(".js-range-slider").ionRangeSlider({
        type: "double",
        skin: "round",
        grid: false
    });
    </script>

<!--===============================================================================================-->
	<script src="/template/js/main.js"></script>

</body>

</html>
