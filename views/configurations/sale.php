<?php include(ROOT . '/views/layouts/header.php');?>
<div class="wrapper_promotions m-l-r-auto p-t-50 p-b-50">
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Delete current sales 
           
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23">
           <form method="post"> 
               <select name="deleted_id">
          <?php foreach ($saleslist as $sale):?>
                   <option value="<?php echo $sale['prod_id'];?>"><?php echo $sale['firm'];?>  <?php echo $sale['name'];?></option>
           <?php endforeach;?>
               </select>
               <input type="submit" value="Delete">
           </form>
       </div>
   </div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Create new sale
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 sosisochka">
           
           <form method="post">
               <select name="id">
                <?php foreach ($prodlist as $products):?>
                   <option value="<?php echo $products['id'];?>"><?php echo $products['firm'];?>  <?php echo $products['name'];?></option>
                   <?php endforeach;?>
               </select>
               <input required type="number" name="new_price" placeholder="New price">
               <input required type="date" name="date" placeholder="Date">
                <input type="submit" >
           </form>
           
       </div>
   </div>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>