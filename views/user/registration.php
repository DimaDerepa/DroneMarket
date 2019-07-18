<?php include(ROOT . '/views/layouts/header.php');?>
            <?php if(isset($errors) && is_array($errors)):?>
    <div class="errors m-l-r-auto m-t-5">   
  
        <ul>
            <?php foreach ($errors as $error):?>
            <li>-<?php echo $error;?>; </li>
            <?php endforeach;?>
        </ul>

    </div>
            <?php endif;?>
 
                  
            <?php if($result): ?>
  
                <div class="dalala m-l-r-auto">
                    REGISTRATION<br> SUCCESSFUL<br>
                    <a class="logdog" href="/user/login">SIGN IN</a>
                </div>
            <?php else:?>

      
      <div id="login-box">
    
   
      <div class="left">
      <h1 class="m-b-40">Sign up</h1>
      <form method="post" class="p-b-37">
          <input type="text" class="login_input" name="username" placeholder="Username" maxlength="12" value="<?php echo $username;?>"/>
        <input type="text" class="login_input" name="email" placeholder="E-mail" maxlength="50" value="<?php echo $email;?>"/>
        <input type="password" class="login_input" name="password" placeholder="Password" maxlength="22" value="<?php echo $password;?>"/>
        <input type="password" class="login_input" name="passwordConfirm" placeholder="Retype password" maxlength="22" value="<?php echo $passwordConfirm;?>"/>
        <input type="submit" class="login_input" name="submit" class="submit_registration" value="Sign up" />
        </form>
   
  </div>

  
   <?php endif;?>
 
</div>
<?php include(ROOT . '/views/layouts/footer.php');?>