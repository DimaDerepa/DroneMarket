<?php include(ROOT . '/views/layouts/header.php');?>
<div class="admin_contacts">
    <form method="post" action="#">
        <span class="config_span">Email adress</span>
        <input name="mail" type="email" value="<?php echo $contacts['mail'];?>">
        <span class="config_span">Phone number</span>
        <input name="phone" type="text" value="<?php echo $contacts['phone'];?>">
        <span  class="config_span">Adress</span>
        <input name="adress" type="text" value="<?php echo $contacts['adress'];?>">
        <span  class="config_span">Link on youtube chanel</span>
        <input name="youtube" type="text" value="<?php echo $contacts['youtube'];?>">
        <span class="config_span">Link on facebook</span>
        <input name="facebook" type="text" value="<?php echo $contacts['facebook'];?>">
        <span class="config_span">Link on instagram profile</span>
        <input name="instagram" type="text" value="<?php echo $contacts['instagram'];?>">
        <input name="submit" type="submit" value="Save changes">
    </form>
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>