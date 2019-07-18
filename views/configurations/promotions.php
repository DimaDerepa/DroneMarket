<?php include(ROOT . '/views/layouts/header.php');?>
<div class="wrapper_promotions m-l-r-auto p-t-50 p-b-50">
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Current promotions settings
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23">
           <div class="table_promotions">
                <?php foreach ($currentPromotions as $promotion):?>
               <div class="promotions_content">
                   <img src="/template/images/promotions/<?php echo $promotion['id']; ?>.jpg">
                   <div class="form_promotions">
                   <span class="m-textJJJJ t-center  m-b-5" >
                       <form method="post">
                           <input class="unvisible_input white_colored" name="change_small" type="text" value="<?php echo $promotion['small_line'];?>">
						</span>
                       <input type="hidden" value="<?php echo $promotion['id']; ?>" name="change_id"	>				
                                            <h2 class=" xl-text145 t-center  m-b-10" >
							 <input name="change_big" class="unvisible_input white_colored" type="text" value="<?php echo $promotion['big_line'];?>">
						</h2>

						<div class=" w-size24 strpr ">
							<!-- Button -->
							<a  class="flex-c-m size222 bo-rad-23 s-text222 text_propotions bgwhite hov1 trans-0-4 m-l-130">
                                                            <input name="change_button"  class="unvisible_input" type="text" value="<?php echo $promotion['button_content'];?>">
							</a>
						</div>
                       <select name="do">
                           <option value="1">Save changes</option>
                           <option value="0">Delete promotion</option>
                       </select>
                       <input class="sosisasa" type="submit">
                        </form>
                   </div>
               </div>
                <?php endforeach; ?>
           </div>
       </div>
   </div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Create new promotion
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 sosisochka">
           <form method="POST" enctype="multipart/form-data">
               <input required type="text" name="small_line" placeholder="small_line">
               <input required type="text" name="big_line" placeholder="big_line">
               <input required type="text" name="button_content" placeholder="button content">
               <select name="product_id">
                   
                   <?php foreach ($prodlist as $products):?>
                   <option value="<?php echo $products['id'];?>"><?php echo $products['firm'];?>  <?php echo $products['name'];?></option>
                   <?php endforeach;?>
               </select>
               <input required type="file" name="wrapper" id="wrapper" accept=".jpg">
               <input type="submit" >
           </form>
           
       </div>
   </div>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>