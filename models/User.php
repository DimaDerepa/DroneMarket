<?php
class User {
    public static function isAdmin(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']==1){
            return TRUE;
            }
        }
        return FALSE; 
    }
    public static function checkAdmin(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']==1){
            return TRUE;
            }
        }
        header("Location: /");
    }
    public static function isGuest(){
        if(isset($_SESSION['user'])){
            return FALSE;
        }
        return TRUE; 
    }
    public static function registration($username, $email, $password){
        $db= Db::getConnection();
        
        $query='INSERT INTO users (nickname, email, password) '
                . 'VALUES (:username, :email, :password)';
        
        $result=$db->prepare($query);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function checkUsername($username){
        if(strlen($username) >= 6){
            return true;
        }
        return false;
    }
    
    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
     public static function checkPassword($password){
        if(strlen($password) >= 8){
            return true;
        }
        return false;
    }
    public static function checkConfirmPassword($password,$passwordConfirm){
        if($password===$passwordConfirm){
            return true;
        }
        return false;
    }
     public static function checkEmailExists($email){
        $db=Db::getConnection();
        $query='SELECT COUNT(*) FROM users WHERE email= :email';
        
       $result=$db->prepare($query);
       $result->bindParam(':email', $email, PDO::PARAM_STR);
       $result->execute();
       
       if($result->fetchColumn()){
           return true;
       }
       return FALSE;
           
    }
    public static function checkUsernameExists($username){
        $db=Db::getConnection();
        $query='SELECT COUNT(*) FROM users WHERE nickname= :username';
        
       $result=$db->prepare($query);
       $result->bindParam(':username', $username, PDO::PARAM_STR);
       $result->execute();
       
       if($result->fetchColumn()){
           return true;
       }
       return FALSE;
           
    }
    public static function checkUserData($username, $password){
        $db=Db::getConnection();
        $query='SELECT * FROM users WHERE '
                . 'nickname = :username AND '
                . 'password= :password';
        
       $result=$db->prepare($query);
       $result->bindParam(':username', $username, PDO::PARAM_STR);
       $result->bindParam(':password', $password, PDO::PARAM_STR);
       $result->execute();
       
     $user=$result->fetch();
     if ($user){
         return $user['id'];
     }
       return FALSE;
           
    }
     public static function auth($userId){
         $_SESSION['user']=$userId;

    }
    
    public static function checkLogged(){

        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /");
    }
      public static function getUserName(){

        if(isset($_SESSION['user'])){
            $db=Db::getConnection();
            $query='SELECT nickname FROM users WHERE id= :id';
            $result=$db->prepare($query);
            $result->bindParam(':id', $_SESSION['user'], PDO::PARAM_STR);
            $result->execute();
            $username=$result->fetch();
            return $username['nickname'];
        }
        return FALSE;
    }
      public static function SaveEmail(){
          if (isset($_POST['Subscribe'])) {
                $db=Db::getConnection();
            $query='INSERT INTO subscribers(email) VALUES (:email)';
            $result=$db->prepare($query);
            $result->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $result->execute();
          }

    }
}
