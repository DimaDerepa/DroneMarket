<?php include_once ROOT . '/config/contacts.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Drone Market</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/template/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/css/util.css">
	<link rel="stylesheet" type="text/css" href="/template/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="<?php echo $contacts['facebook']; ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?php echo $contacts['instagram']; ?>" class="topbar-social-item fa fa-instagram"></a>
					<a href="<?php echo $contacts['youtube']; ?>" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
                                        Free shipping for standard order over $1500
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
                                         <?php if($username==FALSE){echo $contacts['mail'];}else{echo $username;}?>	
					</span>

					
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="/" class="logo">
					<img src="/template/images/icons/logo.ico" alt="IMG-LOGO">
				</a>
                      
				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/">Home</a>
								
							</li>

							<li>
                                                            <a class="shop_item" href="/category/all/">Shop</a>
                                                                <ul class="sub_menu">
                                                                    <?php foreach ($categories as $categoryItem):?>
									<li><a href="/category/<?php echo $categoryItem['id'];?>"> <?php echo $categoryItem['name'];?></a></li>
                                                                    <?php endforeach;?>    
                                                                        
								</ul>
							</li>

							

							<li>
								<a href="/blog/all">Blog</a>
                                                                <ul class="sub_menu">
                                                                    <?php foreach ($blogCategories as $blogCategoryItem):?>
									<li><a href="/blog/<?php echo $blogCategoryItem['id'];?>"> <?php echo $blogCategoryItem['name'];?></a></li>
                                                                    <?php endforeach;?>    
                                                                        
								</ul>
							</li>

							<li>
								<a href="/about">About</a>
							</li>

							<li>
								<a href="/contact">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
                                    <?php if(User::isGuest()):?>
                                    <a href="/user/login" class="header-wrapicon1 dis-block">
                                            <img src="/template/images/icons/login.ico" class="header-icon1" alt="ICON">
					</a>
                                    <span class="linedivide1"></span>
                                    <?php else:?>
                                        <?php if(User::isAdmin()):?>
                                        <a href="/configurations/" class="header-wrapicon1 dis-block">
                                            <img src="/template/images/icons/settings.ico" class="header-icon1" alt="ICON">
					</a>
                                        <span class="linedivide1"></span>
                                        <?php else:?>
					<a href="/profile/" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/profile.ico" class="header-icon1" alt="ICON">
					</a>
                                        <span class="linedivide1"></span>
                                    
                                        <?php endif;?>
                                        <a href="/user/logout" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/logout.ico" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>
                                        <?php endif;?>
					<div class="header-wrapicon2">
                                            <img src="/template/images/icons/icon-header-02.ico" class="header-icon1 js-show-header-dropdown" alt="ICON">
                                                <span id="cart-count" class="header-icons-noti"></span>

						<!-- Header cart noti -->
                                                <div id="cart_div" class="header-cart header-dropdown">
                                                    <ul  id="addul" class="header-cart-wrapitem">
								<?php foreach($productsCart as $productsCartItem):?>
                                                                 <li  class="header-cart-item">
                                                                        <a  class="delete-from-cart" href="" data-id="<?php echo $productsCartItem['id'];?>">
									<div class="header-cart-item-img">
                                                                           
                                                                           <img src="/template/images/products/<?php echo $productsCartItem['id'];?>/1.webp" alt="IMG">
									</div>
                                                                        </a>
									<div class="header-cart-item-txt">
										<a href="/product/<?php echo $productsCartItem['id'];?>" class="header-cart-item-name">
										 
                                                                                    <b> <?php echo $productsCartItem['firm'];?></b>  <?php echo $productsCartItem['name'];?>
                                                                                  
										</a>

										<span class="header-cart-item-info">
                                                                                     <?php echo $productsCartItem['count'];?> x  <?php echo $productsCartItem['price'];?><b>$</b>
										</span>
									</div>
								</li>
                                                               <?php endforeach;?>
							</ul>

							<div class="header-cart-total">
                                                            Total: <?php echo $totall; ?>$
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="/bigcart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="/" class="logo-mobile">
				<img src="/template/images/icons/logo.ico" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu ">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					 <?php if(User::isGuest()):?>
                                    <a href="/user/login" class="header-wrapicon1 dis-block">
                                            <img src="/template/images/icons/login.ico" class="header-icon1" alt="ICON">
					</a>
                                    <span class="linedivide1"></span>
                                    <?php else:?>
                                        <?php if(User::isAdmin()):?>
                                        <a href="/configurations/" class="header-wrapicon1 dis-block">
                                            <img src="/template/images/icons/settings.ico" class="header-icon1" alt="ICON">
					</a>
                                        <span class="linedivide1"></span>
                                        <?php else:?>
					<a href="/profile/" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/profile.ico" class="header-icon1" alt="ICON">
					</a>
                                        <span class="linedivide1"></span>
                                    
                                        <?php endif;?>
                                        <a href="/user/logout" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/logout.ico" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>
                                        <?php endif;?>
					


					<div   class="header-wrapicon2">
                                            <a href="/bigcart">
						<img src="/template/images/icons/icon-header-02.ico" class="header-icon1 js-show-header-dropdown" alt="ICON">
                                                <span id="cart-count" class="header-icons-noti"></span>
                                            </a>

						
					</div>
				</div>
<span class="linedivide1"></span>
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $1500
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								    <?php if($username==FALSE){echo $contacts['mail'];}else{echo $username;}?>	
							</span>

						
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
                                                    <a href="<?php echo $contacts['facebook']; ?>" class="topbar-social-item fa fa-facebook"></a>
                                                    <a href="<?php echo $contacts['instagram']; ?>" class="topbar-social-item fa fa-instagram"></a>
                                                    <a href="<?php echo $contacts['youtube']; ?>" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="/">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="/category/all">Shop</a>
                                                <ul class="sub-menu">
							<?php foreach ($categories as $categoryItem):?>
                                                            <li><a href="/category/<?php echo $categoryItem['id'];?>"> <?php echo $categoryItem['name'];?></a></li>
                                                        <?php endforeach;?>    
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					

					<li class="item-menu-mobile">
						<a href="/blog/all">Blog</a>
                                                <ul class="sub-menu">
                                                    <?php foreach ($blogCategories as $blogCategoryItem):?>
                                                        <li><a href="/blog/<?php echo $blogCategoryItem['id'];?>"> <?php echo $blogCategoryItem['name'];?></a></li>
                                                    <?php endforeach;?>    
                                                </ul>
                                                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                                                
					</li>

					<li class="item-menu-mobile">
						<a href="/about">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="/contact">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>