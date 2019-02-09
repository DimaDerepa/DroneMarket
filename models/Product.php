<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author mc_Dimas
 */
class Product {
      
    const SHOW_BY_DEFAULT=6;
    
    public static function getProductsByFirm($category_id = NULL) {
        $db = Db::getConnection();
        $productsByFirm=array();
        if($category_id==NULL){$where='';}
        else {$where='WHERE category_id='.$category_id.'';}

        $result=$db->query('SELECT  category_id, firm, COUNT(*) FROM products '.$where.' GROUP BY firm ORDER BY COUNT(*) DESC');
         $i=0;
        while($row=$result->fetch()){
             $productsByFirm[$i]['category_id']=$row['category_id'];
            $productsByFirm[$i]['firm']=$row['firm'];
            $productsByFirm[$i]['count']=$row['COUNT(*)'];
  
            $i++;

        }
        return $productsByFirm;
    }
      public static function getProductsByPrice($category_id = NULL) {
        $db = Db::getConnection();
         $productsByPrice=array();
        if($category_id==NULL){$where='';}
        else {$where='WHERE category_id='.$category_id.'';}

        $result=$db->query('SELECT MIN(price), MAX(price) FROM products '.$where.' ORDER BY id');
        while($row=$result->fetch(1)){
            
 
         
            $productsByPrice['MIN(price)']=$row['MIN(price)'];
            $productsByPrice['MAX(price)']=$row['MAX(price)'];

        }
        return  $productsByPrice;
    }
    public static function getCountProducts($category_id = NULL) {
        $db = Db::getConnection();  
       
        if($category_id==NULL){$where='';}
        else{$where=' WHERE category_id='.$category_id;}
        
 
        $result=$db->query('SELECT count(id) AS count FROM products '.$where);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row=$result->fetch();
        return $row['count'];
    
    }
    public static function getProductsByCategory($category_id = NULL, $page=1) {

  
       
        $db = Db::getConnection();  
        $productsByCategory=array();
        if($category_id==FALSE){$where='';}
        else{$where='WHERE category_id='.$category_id;}





        $offset=($page-1)*self::SHOW_BY_DEFAULT;    

        $result=$db->query('SELECT * FROM products '.$where
                .' ORDER BY id DESC '
                .' LIMIT '.self::SHOW_BY_DEFAULT
                .' OFFSET '.$offset);
        
  

         $i=0;
        while($row=$result->fetch()){
            $productsByCategory[$i]['id']=$row['id'];
            $productsByCategory[$i]['name']=$row['name'];
            $productsByCategory[$i]['category_id']=$row['category_id'];
            $productsByCategory[$i]['firm']=$row['firm'];
            $productsByCategory[$i]['price']=$row['price'];
            $productsByCategory[$i]['sale']=$row['sale'];
            $productsByCategory[$i]['recomend']=$row['recomend'];
            $i++;
 
            
       
        }
        return $productsByCategory;
    }

     public static function getProduct($id) {
        $db = Db::getConnection();
        $product=array();
        $result=$db->query('SELECT * FROM products WHERE id='. $id .'');
        while($row=$result->fetch(1)){
            $product['id']=$row['id'];
            $product['name']=$row['name'];
            $product['category_id']=$row['category_id'];
            $product['firm']=$row['firm'];
            $product['price']=$row['price'];
            $product['description']=$row['description'];
            $product['code']=$row['code'];
            $product['specification']=$row['specification'];
            $product['camera_availability']=$row['camera_availability'];
            $product['camera_resolution']=$row['camera_resolution'];
            $product['flight_time']=$row['flight_time'];
            $product['video_resolution']=$row['video_resolution'];
            $product['slow-mo_resolution']=$row['slow-mo_resolution'];
            $product['control_range']=$row['control_range'];
            $product['gimbal']=$row['gimbal'];
            $product['quality']=$row['quality'];
            $product['ease_of_use']=$row['ease_of_use'];
            $product['speed']=$row['speed'];
            $product['portability']=$row['portability'];
            $product['views']=$row['views'];
            
       
        }
     
        $result=$db->query('UPDATE products SET views='.($product['views']+1).' WHERE id='.$product['id']); 



        return $product;
    }
   public static function getRecomendedProductsList() {
        $db = Db::getConnection();
        $productList=array();
        $result=$db->query('SELECT * FROM products WHERE recomend=1 AND in_stock=1 ORDER BY id DESC LIMIT 7');
        $i=0;
        while($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['firm']=$row['firm'];
            $productList[$i]['price']=$row['price'];
            $i++;
        }
        return $productList;
    }
    
     public static function getPromotionsList() {
        $db = Db::getConnection();
        $promotionList=array();
        $result=$db->query('SELECT * FROM promotion WHERE visibility=1 ORDER BY id DESC LIMIT 5');
        $i=0;
        while($row=$result->fetch()){
            $promotionList[$i]['id']=$row['id'];
            $promotionList[$i]['product']=$row['product'];
            $promotionList[$i]['button_content']=$row['button_content'];
            $promotionList[$i]['small_line']=$row['small_line'];
            $promotionList[$i]['big_line']=$row['big_line'];
            $i++;
        }
        return $promotionList;
    }
}
