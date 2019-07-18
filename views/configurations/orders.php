<?php include(ROOT . '/views/layouts/header.php');?>
<div class="wrapper_promotions m-l-r-auto">
<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Waiting to be processed
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 ">
<div class="wrapper_orders m-l-r-auto">
   
<?php foreach ($orders as $order):?> 
   
    <?php if($order['status']=='waiting to be processed'):?>
<div class="orderlist m-l-r-auto">
   
    <form method="post">
        <label>Id</label>
        <input type="text" name="id" class="t-center" value="<?php echo $order['id'];?>" readonly><br>
       
        <label>Set new status</label>
        <select name="new_status" class="m-b-20">
            <option value="waiting to be processed">waiting to be processed</option>
            <option value="sent">sent</option>
            <option value="failed to contact">failed to contact</option>
            <option value="received">received</option>
        </select>
        <input type="submit" name="submit_order" >
    </form>
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

<?php endif;?>
<?php endforeach;?>
    </div>
       </div>
</div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
           Sent
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 ">
<div class="wrapper_orders m-l-r-auto">
   
<?php foreach ($orders as $order):?> 
    <?php if($order['status']=='sent'):?>
<div class="orderlist m-l-r-auto">
   
    <form method="post">
        <label>Id</label>
        <input type="text" name="id" class="t-center" value="<?php echo $order['id'];?>" readonly><br>
       
        <label>Set new status</label>
        <select name="new_status" class="m-b-20">
            <option value="waiting to be processed">waiting to be processed</option>
            <option value="sent">sent</option>
            <option value="failed to contact">failed to contact</option>
            <option value="received">received</option>
        </select>
        <input type="submit" name="submit_order" >
    </form>
      <label>Username</label>
     <?php echo $order['name'];?>
        <label>Phone number</label>
     <?php echo $order['phone'];?>
         <label>Order</label>
     <?php echo $order['list'];?>
          <label>Date of Last update </label>
     <?php if($order['last_update']=='30-11--0001'){echo 'NEW';}else{echo $order['last_update'];}?>
</div>

<?php endif;?>
<?php endforeach;?>
    </div>
       </div>
</div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
          Failed to contact
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 ">
<div class="wrapper_orders m-l-r-auto">
   
<?php foreach ($orders as $order):?> 
    <?php if($order['status']=='failed to contact'):?>
<div class="orderlist m-l-r-auto">
   
    <form method="post">
        <label>Id</label>
        <input type="text" name="id" class="t-center" value="<?php echo $order['id'];?>" readonly><br>
       
        <label>Set new status</label>
        <select name="new_status" class="m-b-20">
            <option value="waiting to be processed">waiting to be processed</option>
            <option value="sent">sent</option>
            <option value="failed to contact">failed to contact</option>
            <option value="received">received</option>
        </select>
        <input type="submit" name="submit_order" >
    </form>
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

<?php endif;?>
<?php endforeach;?>
    </div>
       </div>
</div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
       <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text25 color0-hov trans-0-4">
          Received
               <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
               <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
       </h5>

       <div class="dropdown-content dis-none p-t-15 p-b-23 ">
<div class="wrapper_orders m-l-r-auto">
   
<?php foreach ($orders as $order):?> 
    <?php if($order['status']=='received'):?>
<div class="orderlist m-l-r-auto">
   
    <form method="post">
        <label>Id</label>
        <input name="id" type="text" class="t-center" value="<?php echo $order['id'];?>" readonly><br>
       
        <label>Set new status</label>
        <select name="new_status" class="m-b-20">
            <option value="waiting to be processed">waiting to be processed</option>
            <option value="sent">sent</option>
            <option value="failed to contact">failed to contact</option>
            <option value="received">received</option>
        </select>
        <input type="submit" name="submit_order" >
    </form>
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

<?php endif;?>
<?php endforeach;?>
    </div>
       </div>
</div>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>