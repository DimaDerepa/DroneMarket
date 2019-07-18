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
<div class="wrapper_promotions m-l-r-auto">
   
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Add new article
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
           Delete article
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 lalalal">
           <form method="POST" >
               <label>Choose article</label>
               <select name="delete_id">
                   <?php foreach ($all as $value) :?>
     
 
                   <option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
                   <?php endforeach;?>
                 
               </select>
               
               <input name="delete_article" type="submit">
           </form>
           
       </div>
   </div>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>