<?php include(ROOT . '/views/layouts/header.php');?>
<?php include_once ROOT . '/config/contacts.php';?>
<div class="zozo">
    <h3 >Our store in the map </h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1053.3461091683096!2d-73.98292367815965!3d40.74777549845586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2590764efb547%3A0xd493aa50baa0d839!2sOn+Stage+Dancewear+NYC+-+Capezio%2C+Bloch+%26+More!5e0!3m2!1sru!2sua!4v1555768097781!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<p class="s-text7 w-size27">
                                            Any questions? Let us know in store at <br> <?php echo $contacts['adress']; ?><br> Or call us on <?php echo $contacts['phone']; ?>
					</p>
                                         <h3>Mail us</h3>
                                        <p>
dronemarket@gmail.com</p>
 <h3>Our social networks</h3>
					<div class="flex-m ">
                                           
						<a href="<?php echo $contacts['facebook']; ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?php echo $contacts['instagram']; ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="<?php echo $contacts['youtube']; ?>" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
                                       

</div>
<?php include(ROOT . '/views/layouts/footer.php');?>