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
           Add new product
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 lalalal">
           <form method="POST" enctype="multipart/form-data">
               <label>Firm name</label>
               <input required type="text" name="firm" placeholder="firm">
               <label>Name of product</label>
               <input required type="text" name="name" placeholder="name">
               <label>Choose category</label>
               <select class="m-b-30" name="category">
                   <option value="1">Camera drones</option>
                   <option value="2">Racing drones</option>
                   <option value="3">Toy drones</option>
                   <option value="4">Cameras</option>
                   <option value="5">Accessories</option>
                </select>
               <label>Price ($)</label>
               <input required type="text" name="price" placeholder="Price">
               <label>Input code</label>
               <input required type="text" name="code" placeholder="code">
               <label>In stock</label>
               <select class="m-b-30" name="in_stock">
                   <option value="1">In stock</option>
                   <option value="0">Not avalible</option>
                </select>
                <label>Description</label>
                <textarea  required name="description" cols="100" rows="80" maxlength="5000"> </textarea>
                <label class="m-t-30">Specification</label>
                <textarea  required name="specification" cols="100" rows="80" maxlength="5000"> </textarea>
                
                <label class="m-t-30">Flight time (in minutes)</label>
               <input  type="text" name="flight_time" placeholder="flight time">
                
                <label>Camera avalibility</label>
                <select class="m-b-30" name="camera_avaliable">
                    <option value="1">In stock</option>
                     <option value="0">Not avalible</option>
                </select>
                  <label >Camera resolution (0000x0000)</label>
               <input  type="text" name="camera_resolution" placeholder="Camera resolution">
               <label >Slow-mo resolution (0000x0000)</label>
               <input  type="text" name="slow_resolution" placeholder="Slow-mo resolution">
                <label >Video resolution (0000x0000)</label>
               <input  type="text" name="video_resolution" placeholder="Video resolution">
               <label >Control range (in meters)</label>
               <input  type="text" name="control_range" placeholder="Control range">
               <label >Gimbal </label>
               <input  type="text" name="gimbal" placeholder="Gimbal">
               <label >Quality (0.00 - 10.00) </label>
               <input  type="text" name="quality" placeholder="Quality">
                <label >Easy of Use (0.00 - 10.00) </label>
               <input  type="text" name="easy_of_use" placeholder="Easy of Use">
               <label >Speed (0.00 - 10.00) </label>
               <input  type="text" name="speed" placeholder="Speed">
               <label >Portability (0.00 - 10.00) </label>
               <input  type="text" name="portability" placeholder="Portability">
               <label >Views </label>
               <input  type="number" value="0" name="views" disabled>
                <label>Recomend list</label>
                <select class="m-b-30" name="recomend">
                    <option value="1">Recomend</option>
                     <option value="0">Not recomend</option>
                </select>
                 <label>Sale label</label>
                <select class="m-b-30" name="sale">
                    <option value="1">With sale label</option>
                     <option value="0">Without label</option>
                </select>
                  <label>Main photo</label>
                  <input name="1" required type="file" accept=".jpg">
                 <label>Second photo</label>
                 <input name="2" required type="file" accept=".jpg">
                 <label>Third photo</label>
                 <input name="3" required type="file" accept=".jpg">
                 
                 
                 <label>Additional photos</label>
                 <input name="add[]" type="file" multiple accept=".jpg"/>
                   
                 <input name="add_product" type="submit">
           </form>
           
       </div>
   </div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Delete product
           
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23">
           <form method="post"> 
               <select name="deleted_id">
          <?php foreach ($all as $sale):?>
                   <option value="<?php echo $sale['id'];?>"><?php echo $sale['firm'];?>  <?php echo $sale['name'];?></option>
           <?php endforeach;?>
               </select>
               <input type="submit" value="Delete">
           </form>
       </div>
   </div>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>