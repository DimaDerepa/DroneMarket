<?php
class UserController {
   public function actionRegistration() {
       
        $username='';
        $email='';
        $password='';
        $passwordConfirm='';
        $result=FALSE;
        
        if(isset($_POST['submit'])){
           $username=$_POST['username'];
           $email=$_POST['email'];
           $password=$_POST['password'];
           $passwordConfirm=$_POST['passwordConfirm'];
            
           $errors=false;
           if(!User::checkUsername($username)){
               $errors[]='Username must be more than 6 symbols';
           }
           if(!User::checkEmail($email)){
               $errors[]='Incorrect email';
           }
           if(!User::checkPassword($password)){
               $errors[]='Password must be lonher than 8 symbols';
           }
           if(!User::checkConfirmPassword($password, $passwordConfirm)){
               $errors[]='Passwords don`t match';
           }
           if(User::checkEmailExists($email)){
               $errors[]='This email already registered';
           }
            if(User::checkUsernameExists($username)){
               $errors[]='This username already registered';
           }
           if($errors==FALSE){
               $result= User::registration($username, $email, $password);
           }
       }
       
       
       
       
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/user/registration.php');
        return true;
        
    }
     public function actionLogin() {
       
       $username='';
       $password='';
       
       if(isset($_POST['submit'])){
           $username=$_POST['username'];
           $password=$_POST['password'];
           
           $errors=FALSE;
           
           if(!User::checkUsernameExists($username)){
              $errors[]='User '.$username.' doesn`t exists.<br>'
                      . '<a href="/user/registration">Registrate it</a>';
           }
          
           $userId= User::checkUserData($username, $password);
            if($userId==FALSE){
                $errors[]='Incorrect username or password';
            } else {
                User::auth($userId);
                
               header("Location: /profile/");
            }
       }
       
       
       
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/user/login.php');
        return true;
        
    }
    public function actionLogout() {
        session_start();
        unset($_SESSION['user']);
        header("Location: /user/login");
        
    }
     
}
