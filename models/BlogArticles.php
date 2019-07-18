<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author mc_Dimas
 */
class BlogArticles {
     public static function geALLArticles() {
        $db = Db::getConnection();
        $blogCategoryList=array();
        $result=$db->query('SELECT * FROM articles ORDER BY id DESC');
        $i=0;
        while($row=$result->fetch()){
            $blogCategoryList[$i]['id']=$row['id'];
            $blogCategoryList[$i]['title']=$row['title'];
            $i++;
        }
        return $blogCategoryList;
    }
      public static function getBlogCategoriesList() {
        $db = Db::getConnection();
        $blogCategoryList=array();
        $result=$db->query('SELECT * FROM blog_categories ORDER BY id ASC');
        $i=0;
        while($row=$result->fetch()){
            $blogCategoryList[$i]['id']=$row['id'];
            $blogCategoryList[$i]['name']=$row['name'];
            $i++;
        }
        return $blogCategoryList;
    }
    public static function getArticleCount($category) {
        $db = Db::getConnection();
        $articleList=array();
        if(isset($category)){$where=' WHERE category_id='.$category;} else {$where='';}
  
        $result=$db->query('SELECT COUNT(*) AS count FROM articles'.$where);
      
        while($row=$result->fetch()){
            $articleList=$row['count'];
          
        }
        return (int)$articleList;
    }
    public static function getArticleList($category,$page) {
        $db = Db::getConnection();
        $articleList=array();
        if(isset($category)){$where=' WHERE category_id='.$category;} else {$where='';}
        $offset=($page-1)*2;   
        $result=$db->query('SELECT * FROM articles'.$where.' ORDER BY id DESC LIMIT 2 OFFSET '.$offset.'');
        $i=0;
        while($row=$result->fetch()){
            $articleList[$i]['id']=$row['id'];
            $articleList[$i]['category_id']=$row['category_id'];
            $articleList[$i]['title']=$row['title'];
            $articleList[$i]['text']=$row['text'];
            $articleList[$i]['date']=(new DateTime($row['date']))->format('j M, Y');
            $articleList[$i]['author_id']=$row['author_id'];
            $i++;
        }
        return $articleList;
    }
     public static function getOurBlogArticles() {
        $db = Db::getConnection();
        $articleList=array();
        $result=$db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 3');
        $i=0;
        while($row=$result->fetch()){
            $articleLastThree[$i]['id']=$row['id'];
            $articleLastThree[$i]['category_id']=$row['category_id'];
            $articleLastThree[$i]['title']=$row['title'];
            $articleLastThree[$i]['text']=$row['text'];
            $articleLastThree[$i]['date']=$row['date'];
            $articleLastThree[$i]['author_id']=$row['author_id'];
            $i++;
        }
        return $articleLastThree;
    }
    public static function getCountComments() {
        $db = Db::getConnection();
        $commentCount=array();
        $result=$db->query('SELECT article_id, COUNT(*) FROM comments GROUP BY article_id');
    
        while($row=$result->fetch()){
            $commentCount[$row['article_id']]=$row['COUNT(*)'];
           
        
        }
        return $commentCount;
    }
     public static function getAuthorName() {
        $db = Db::getConnection();
        $authorName=array();
        $result=$db->query('SELECT * FROM users');
 
        while($row=$result->fetch()){
           
            $authorName[$row['id']]=$row['nickname'];
       
        }
        return $authorName;
    }
     public static function getArticle($id) {
        $db = Db::getConnection();
        $article=array();
        $result=$db->query('SELECT * FROM articles WHERE id ='. $id .'');
        while($row=$result->fetch(1)){
            $article['id']=$row['id'];
            $article['category_id']=$row['category_id'];
            $article['title']=$row['title'];
            $article['text']= InputContentInBlog::replacer($row['text'],$row['id']);
            $article['date']=$row['date'];
            $article['author_id']=$row['author_id'];
        }
        return $article;
    }
     public static function getCategory($id) {
        $db = Db::getConnection();
        $articlesByCategory=array();
        $result=$db->query('SELECT * FROM articles WHERE category_id ='. $id .'');
        while($row=$result->fetch()){
            $articleByCategory['id']=$row['id'];
            $articleByCategory['category_id']=$row['category_id'];
            $articleByCategory['title']=$row['title'];
            $articleByCategory['text']=$row['text'];
            $articleByCategory['date']=$row['date'];
            $articleByCategory['author_id']=$row['author_id'];
        }
        return $articleByCategory;
    }
     public static function getCountSearched() {
        $db = Db::getConnection();
        $articleList=array();
        if (isset($_POST['search_product'])) {
            $likeQuery=$_POST['search_product'];
            $likeQuery= trim($likeQuery);
            $likeQuery= strip_tags($likeQuery);
        }
        else{  $likeQuery='';}
      
        $result=$db->query("SELECT COUNT(*) as count FROM articles WHERE title LIKE '%$likeQuery%'");
   
        while($row=$result->fetch()){
            $articleList=$row['count'];
       
        
        }
        return $articleList;
    }

     public static function getSearchedArticleList($page) {
        $db = Db::getConnection();
        $articleList=array();
        if (isset($_POST['search_product'])) {
            $likeQuery=$_POST['search_product'];
            $likeQuery= trim($likeQuery);
            $likeQuery= strip_tags($likeQuery);
        }
        else{  $likeQuery='';}
        $offset=($page-1)*2;   
        $result=$db->prepare('SELECT * FROM articles WHERE title LIKE ? ORDER BY id DESC LIMIT 2 OFFSET '.$offset.'');
        $params = array("%$likeQuery%");
        $result->execute($params);
        
        $i=0;
        while($row=$result->fetch()){
            $articleList[$i]['id']=$row['id'];
            $articleList[$i]['category_id']=$row['category_id'];
            $articleList[$i]['title']=$row['title'];
            $articleList[$i]['text']=$row['text'];
            $articleList[$i]['date']=(new DateTime($row['date']))->format('j M, Y');
            $articleList[$i]['author_id']=$row['author_id'];
            $i++;
        }
        return $articleList;
    }
        public static function getUsersArticles() {
        $db = Db::getConnection();
        $author_id=$_SESSION['user'];
        
        
        $result=$db->prepare('SELECT * FROM articles WHERE author_id='.$author_id);
     
        $result->execute();
        
        $i=0;
        while($row=$result->fetch()){
            $articleList[$i]['id']=$row['id'];
            $articleList[$i]['category_id']=$row['category_id'];
            $articleList[$i]['title']=$row['title'];
            $articleList[$i]['text']=$row['text'];
            $articleList[$i]['date']=(new DateTime($row['date']))->format('j M, Y');
            $articleList[$i]['author_id']=$row['author_id'];
            $i++;
        }
        return $articleList;
    }
}
