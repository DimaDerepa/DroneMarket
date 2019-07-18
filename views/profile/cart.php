<?php include(ROOT . '/views/layouts/header.php');$orderlist='';$ch=0;?>
<div class="tavle">
    <h3 class="t-center m-b-30 m-t-50">CART</h3>
    <table class="m-l-r-auto m-t-50 m-b-50 t-center  p-b-10 p-t-10">
    <tr>
        <td >Image</td>
        <td>Name</td>
        <td >Price</td>
        <td >Count</td>
        
        <td>Delete</td>
    </tr>
    <?php foreach($productsCart as $value):?>
    
     
    <tr>
        <td><a href="/product/<?php echo $value['id'];?>"><img width="80px" src="/template/images/products/<?php echo $value['id']; ?>/1.jpg"></a></td>
        <td> <a href="/product/<?php echo $value['id'];?>"><b><?php echo $value['firm'];?></b> <?php echo $value['name'];?></a></td>
        <td><?php if (isset($value['sale']) && $value['sale']==1) {echo $value['new_price']."$";}else{ echo $value['price']."$";}
        $orderlist.=$value['id']."-".$value['count'].",";$ch+=$value['total'];?></td>
        <td>  <?php echo $value['count'];?></td>
       
        <td>
            
            <form method="post">
                <input type="hidden" name="deleted_id" value="<?php echo $value['id'];?>">
                <input type="submit" name="delete_from_cart" value="Delete">
            </form>
        </td>
    </tr>

        
    
    <?php endforeach;?>
    <tr>
    
        <td><?php echo 'Total<br>'.$ch."$";?></td>
    <form method="post">
        <td><input name="phone" required type="text" class="ggwp" name="phone" placeholder="Phone"></td>
        <td> <input class="ggwp" readonly name="name" <?php if(isset($_SESSION['user'])){echo ' value='.$username;}else{echo 'value="GUEST" placeholder="Your name"';}?> type="text" ></td>
        <input name="list"  type="hidden" value="<?php $rest = substr($orderlist, 0, -1);  echo $rest;?>" >
        <td><input name="create_order" type="submit" value="Submit"></td>
    </form>
        <td>
            <form method="post">
                <input type="submit" name="clear_cart" value="Clear all">
            </form>
        </td>
       
    </tr>
           </table>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>