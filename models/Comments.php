<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coments
 *
 * @author mc_Dimas
 */
class Comments {
   public static function getBlogComments($id){
       $db = Db::getConnection();
        
       $product=array();
       
        $result=$db->query('SELECT * FROM comments WHERE article_id='.$id);
        while($row=$result->fetch()){
          
            $product[$row['id']]['author_id']=$row['author_id'];
            $product[$row['id']]['title']=$row['title'];
            $product[$row['id']]['text']=$row['text'];
            $product[$row['id']]['date']=(new DateTime($row['date']))->format('j M, Y');
            $product[$row['id']]['id']=$row['id'];
       
       
        }
       
      
        


        return $product;
    }
    public static function getProductComments($id){
       $db = Db::getConnection();
        $today = date('Y-m-d');
       $product=array();
       
        $result=$db->query('SELECT * FROM comments WHERE product_id='.$id);
        while($row=$result->fetch()){
          
            $product[$row['id']]['author_id']=$row['author_id'];
            $product[$row['id']]['title']=$row['title'];
            $product[$row['id']]['text']=$row['text'];
            $product[$row['id']]['date']=(new DateTime($row['date']))->format('j M, Y');
            $product[$row['id']]['id']=$row['id'];
       
       
        }
       
      
        


        return $product;
    }
     public static function saveCommentBlog($id){
         if (isset($_POST['submit_comment'])){
       $db = Db::getConnection();
       $title=$_POST['comment_title'];
       $text=$_POST['comment_text'];
       $author_id= User::checkLogged();
       $article_id=$id;
       
         $query="INSERT INTO comments(article_id, author_id, title, text) VALUES (:article, :author, :title, :text)";
           
        $result=$db->prepare($query);
        $result->bindValue(':article', $article_id);
        $result->bindValue(':author', $author_id);
        $result->bindValue(':title', $title);
         $result->bindValue(':text', $text);
        $result->execute();
         return  TRUE;
         }
         return FALSE;
    }
    public static function saveCommentProduct($id){
         if (isset($_POST['submit_comment'])){
       $db = Db::getConnection();
       $title=$_POST['comment_title'];
       $text=$_POST['comment_text'];
       $author_id= User::checkLogged();
       $prod_id=$id;
       
         $query="INSERT INTO comments(product_id, author_id, title, text) VALUES (:prod, :author, :title, :text)";
           
        $result=$db->prepare($query);
        $result->bindValue(':prod', $prod_id);
        $result->bindValue(':author', $author_id);
        $result->bindValue(':title', $title);
         $result->bindValue(':text', $text);
        $result->execute();
         return  TRUE;
         }
         return FALSE;
    }
    public static function deleteComment(){
        if (isset($_POST['delete_comment'])){
         $db = Db::getConnection();
         $id=$_POST['id'];
        $query="DELETE FROM comments WHERE id=:id";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);

        $result->execute();
         return  TRUE;
    }
    return FALSE;
    }
     public static function getCommentId(){
        
         $db = Db::getConnection();
         $id=$_SESSION['user'];
   
        $product=array();
       
        $result=$db->query('SELECT * FROM comments WHERE author_id='.$id);
        while($row=$result->fetch()){
          
            $product[$row['id']]['author_id']=$row['author_id'];
            $product[$row['id']]['title']=$row['title'];
            $product[$row['id']]['text']=$row['text'];
            $product[$row['id']]['date']=(new DateTime($row['date']))->format('j M, Y');
            $product[$row['id']]['id']=$row['id'];
       
       
        }
       
      
        


        return $product;
    }
  
}
