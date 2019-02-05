<?php include_once ROOT . '/config/contacts.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Drone Market</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/template/images/icons/favicon.png"/>
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
						<?php echo $contacts['mail']; ?>
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="/" class="logo">
					<img src="/template/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/">Home</a>
								
							</li>

							<li>
                                                            <a class="shop_item" href="/shop/">Shop</a>
                                                                <ul class="sub_menu">
                                                                    <?php foreach ($categories as $categoryItem):?>
									<li><a href="/category/<?php echo $categoryItem['id'];?>"> <?php echo $categoryItem['name'];?></a></li>
                                                                    <?php endforeach;?>    
                                                                        
								</ul>
							</li>

							

							<li>
								<a href="/blog/">Blog</a>
                                                                <ul class="sub_menu">
                                                                    <?php foreach ($blogCategories as $blogCategoryItem):?>
									<li><a href="/blog/<?php echo $blogCategoryItem['id'];?>"> <?php echo $blogCategoryItem['name'];?></a></li>
                                                                    <?php endforeach;?>    
                                                                        
								</ul>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
                                    <?php if(User::isGuest()):?>
                                    <a href="/user/login" class="header-wrapicon1 dis-block">
                                            <img src="/template/images/icons/login.png" class="header-icon1" alt="ICON">
					</a>
                                    <span class="linedivide1"></span>
                                    <?php else:?>
					<a href="/profile/" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/profile.png" class="header-icon1" alt="ICON">
					</a>
                                    <span class="linedivide1"></span>
                                    
                                        
                                        <a href="/user/logout" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/logout.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>
                                        <?php endif;?>
					<div class="header-wrapicon2">
						<img src="/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/template/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											drone 1
										</a>

										<span class="header-cart-item-info">
											1 x $1900.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/template/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Drone accamulator
										</a>

										<span class="header-cart-item-info">
											2 x $390.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/template/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											action camera
										</a>

										<span class="header-cart-item-info">
											1 x $87.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $2767.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
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
				<img src="/template/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/template/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											drone 1
										</a>

										<span class="header-cart-item-info">
											1 x $1900.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/template/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Drone accamulator
										</a>

										<span class="header-cart-item-info">
											2 x $390.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/template/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											action camera
										</a>

										<span class="header-cart-item-info">
											1 x $87.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $2767.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

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
								<?php echo $contacts['mail']; ?>
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
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
						<a href="index.html">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="/shop/">Shop</a>
                                                <ul class="sub-menu">
							<?php foreach ($categories as $categoryItem):?>
                                                            <li><a href="/category/<?php echo $categoryItem['id'];?>"> <?php echo $categoryItem['name'];?></a></li>
                                                        <?php endforeach;?>    
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					

					<li class="item-menu-mobile">
						<a href="blog/">Blog</a>
                                                <ul class="sub-menu">
                                                    <?php foreach ($blogCategories as $blogCategoryItem):?>
                                                        <li><a href="/blog/<?php echo $blogCategoryItem['id'];?>"> <?php echo $blogCategoryItem['name'];?></a></li>
                                                    <?php endforeach;?>    
                                                </ul>
                                                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                                                
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>