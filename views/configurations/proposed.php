<?php include(ROOT . '/views/layouts/header.php');?>
<DIV class="sosisochka m-l-r-auto sosison p-t-100 p-b-100" >
    <form id="form" method="post">
<?php foreach ($articles as $article):?>
<div>
    <span><h3><?php echo $article['title']; ?></h3><br><br></span>
    <DIV style="width:80vw;word-wrap:break-word;"><?php echo $article['text']; ?></DIV>

        <label>Post/delete article</label>
        <input name="<?php echo $article['id'];?>" type="checkbox">
</div>
<?php endforeach;?>
        
<input form="form" name="submit" type="submit">
            </form>
</DIV>
<?php include(ROOT . '/views/layouts/footer.php');?>