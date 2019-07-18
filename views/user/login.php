<?php include(ROOT . '/views/layouts/header.php');?>
           <div class="log-form m-l-r-auto">
  <h2>Login to your account</h2>
  <form method="post" action="#">
      <input type="text" name="username"  title="username" placeholder="username" value="<?php echo $username;?>"/>
      <input type="password" name="password" title="password" placeholder="password" value="<?php echo $password;?>"/>
    <input type="submit" name="submit" value="Login" class="btn">
      
 
  </form>
  <span class="defaultspan">Or</span>
  <a href="/user/registration">
 <button  class="btn">Sign up</button>
  </a>
  <?php if(isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error):?>
            <li>-<?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div><!--end log form -->
<?php include(ROOT . '/views/layouts/footer.php');?>
