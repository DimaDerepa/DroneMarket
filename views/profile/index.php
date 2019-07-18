<?php include(ROOT . '/views/layouts/header.php');?>
<script type="text/javascript" src="/template/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ 
    selector:'textarea', 
    height:500, 
    plugins:[
    "advlist autolink autoresize autosave colorpicker contextmenu directionality emoticons fullpage",
    "fullscreen help hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable  pagebreak paste preview",
    "print save searchreplace spellchecker tabfocus table template textcollor textpattern toc visualblocks visulchars wordcount"
    ],
            
    });</script>

<div class="wrapper_promotions m-l-r-auto m-t-50 m-b-50">
    <h3 class="t-center m-b-30">MY PROFILE</h3>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
          Write article
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 lalalal">
           <form method="POST" enctype="multipart/form-data">
               <input required name="title" type="text" placeholder="title">
               <label>Article content</label>
               <textarea required name="text" cols="100" rows="80" maxlength="5000"> </textarea>
               <label>Choose category</label>
               <select name="category_id">
                   <option value="1">Tips & Tricks</option>
                   <option value="2">Tutorials</option>
                   <option value="3">Reviews</option>
                   <option value="4">News</option>
                   <option value="5">Other</option>
               </select>
               <input required type="file" name="wrapper" accept=".jpg">
               <input name="submit_article" type="submit">
           </form>
           
       </div>
   </div>
     <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
          My Articles
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 lalalal">
           <section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			

			<div class="row">
                            <?php foreach ($myArticles as $articleItem):?>
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

           
       </div>
   </div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
        My comments
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 lalalal">
           <?php foreach($mycomments as $value):?>
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
           
       </div>
   </div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
         My orders
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 lalalal">
           <div class="wrapper_orders m-l-r-auto">
   
<?php foreach ($orders as $order):?> 
   
   
<div class="orderlist m-l-r-auto">
  
      <label>Username</label>
     <?php echo $order['name'];?>
        <label>Phone number</label>
     <?php echo $order['phone'];?>
         <label>Order</label>
     <?php  $z=explode(",",$order['list']);
     $i=0;
foreach ($z as $value){
   
    $a=explode("-", $value);
     $ch[$i]=$prodAll[$a[0]]['price']*$a[1];
    $i++;
echo $prodAll[$a[0]]['firm'].' '.$prodAll[$a[0]]['name'].'<br>'.$prodAll[$a[0]]['price'].'$<br>Count-'.$a[1].'<br>';}
echo '<label>Total price</label>'.array_sum($ch).'$';?>



          <label>Date of Last update </label>
     <?php if($order['last_update']=='30-11--0001'){echo 'NEW';}else{echo $order['last_update'];}?>
</div>


<?php endforeach;?>
    </div>
           
       </div>
   </div>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>