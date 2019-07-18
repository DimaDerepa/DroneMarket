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
    public static function getProductsALL() {
        $db = Db::getConnection();
        $productsByFirm=array();
       

        $result=$db->query('SELECT * FROM products');
        $i=0;
        while($row=$result->fetch()){
             $productsByFirm[$i]['id']=$row['id'];
            $productsByFirm[$i]['firm']=$row['firm'];
            $productsByFirm[$i]['name']=$row['name'];
  
            $i++;

        }
        return $productsByFirm;
    }
       public static function getProductsVse() {
        $db = Db::getConnection();
        $productsByFirm=array();
       

        $result=$db->query('SELECT * FROM products');
    
        while($row=$result->fetch()){
             $productsByFirm[$row['id']]['id']=$row['id'];
            $productsByFirm[$row['id']]['firm']=$row['firm'];
            $productsByFirm[$row['id']]['name']=$row['name'];
             $productsByFirm[$row['id']]['price']=$row['price'];
  


        }
        return $productsByFirm;
    }
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
     public static function getPrices($category_id=NULL) { 
     $db = Db::getConnection();
        $pricesRange=array();
        if($category_id==NULL){$where='';}
        else {$where='WHERE category_id='.$category_id.'';}
        $result=$db->query('SELECT price FROM products '.$where);
        $i=0;
        while($row=$result->fetch()){
             
            $pricesRange[$i]=$row['price'];
        
  
            $i++;

        }
        
        return $pricesRange;
    }
    public static function getCountFiltered($category_id = NULL) {
     if($_POST!=NULL){
              $_SESSION['filters']=array();
              $_SESSION['filters']=$_POST;
              $firmsArray=$_SESSION['filters'];
          
          }else{
              $firmsArray=$_SESSION['filters'];
          }
          $keysValues=array();
          $check=array();
          foreach ($firmsArray as $key => $value) {
              $keysValues[]=$key;
              
          }
          foreach ($keysValues as $k){
              if (preg_match('/^firm_\d/',$k)) {
                  $check[]=$k;
              }
          }
          if ($check==NULL){
              $i=0;
              foreach (Product::getProductsByFirm($category_id) as $key => $value) {
                  $firmsArray[]=$value['firm'];
                  $i++;
              }
              
          }
          
         
          $range=explode(";",$firmsArray['my_range']);
       
          
           $db= Db::getConnection();
          
             if($category_id!=NULL){$slaym='AND category_id='.$category_id;}else{$slaym='';}
         $params=["fromRange"=>$range[0],"toRange"=>$range[1],];
        $ass="";
       
        foreach ($firmsArray as $key => $value) {
            $keyOther=":firm_".$key;
            $ass .="$keyOther,";
            $assKeyOther[$keyOther]=$value;
        }
        $ass= rtrim($ass,",");
        $sqlQuery='SELECT COUNT(id) AS count from products WHERE firm IN ('.$ass.') AND (price BETWEEN :fromRange AND :toRange) '.$slaym;
        $result=$db->prepare($sqlQuery);
          
    
       
      
$filteredProducts=array();
           $result->execute(array_merge($params,$assKeyOther));
      
        while ($row = $result->fetch()) {
            $filteredProducts=$row['count'];
           
        
        }
     
        
        
       
        return $filteredProducts;
  
    }
       public static function getFilteredProducts($category_id = NULL, $page=1) {
            $today = date('Y-m-d');
          if($_POST!=NULL){
              $_SESSION['filters']=array();
              $_SESSION['filters']=$_POST;
              $firmsArray=$_SESSION['filters'];
          
          }else{
              $firmsArray=$_SESSION['filters'];
          }
          $keysValues=array();
          $check=array();
          foreach ($firmsArray as $key => $value) {
              $keysValues[]=$key;
              
          }
          foreach ($keysValues as $k){
              if (preg_match('/^firm_\d/',$k)) {
                  $check[]=$k;
              }
          }
          if ($check==NULL){
             
              foreach (Product::getProductsByFirm($category_id) as $key => $value) {
                  $firmsArray[]=$value['firm'];
                 
              }
              
          }
          
         $salesList=array();
         $db= Db::getConnection();
        $bazar=$db->query('SELECT * FROM sales WHERE date_stop>'.$today);
        $j=0;
        while($row=$bazar->fetch()){
            $salesList[$j]['product_id']=$row['product_id'];
            $salesList[$j]['new_price']=$row['new_price'];
            $salesList[$j]['date_stop']=$row['date_stop'];
            $j++;
        }
           $saleItem=array();
        foreach ($salesList as $value){
 
            $saleItem[$value['product_id']]=array("new_price"=>$value['new_price'],"date_stop"=>$value['date_stop']);
            
        }
          $range=explode(";",$firmsArray['my_range']);
          $sas=$firmsArray['order'];
          
           
          
               $chica='`'.$firmsArray['sorting'].'`';
               if($category_id!=NULL){$slaym='AND category_id='.$category_id;}else{$slaym='';}
         $params=["fromRange"=>$range[0],"toRange"=>$range[1]];
        $ass="";
        $offset=($page-1)*self::SHOW_BY_DEFAULT;   
        foreach ($firmsArray as $key => $value) {
            $keyOther=":firm_".$key;
            $ass .="$keyOther,";
            $assKeyOther[$keyOther]=$value;
        }
        $ass= rtrim($ass,",");
        $sqlQuery='SELECT * from products WHERE firm IN ('.$ass.') AND (price BETWEEN :fromRange AND :toRange) '.$slaym.' ORDER BY '.$chica.$sas.' LIMIT '.self::SHOW_BY_DEFAULT.' OFFSET '.$offset.'';
        $result=$db->prepare($sqlQuery);
          
    
       
      
$filteredProducts=array();
           $result->execute(array_merge($params,$assKeyOther));
           $i=0;
        while ($row = $result->fetch()) {
             $filteredProducts[$i]['id']=$row['id'];
            $filteredProducts[$i]['in_stock']=$row['in_stock'];
            $filteredProducts[$i]['name']=$row['name'];
            $filteredProducts[$i]['category_id']=$row['category_id'];
            $filteredProducts[$i]['firm']=$row['firm'];
            $filteredProducts[$i]['price']=$row['price'];
            $filteredProducts[$i]['recomend']=$row['recomend'];
            if(array_key_exists($filteredProducts[$i]['id'],$saleItem)){
                $filteredProducts[$i]['new_price']=$saleItem[$filteredProducts[$i]['id']]['new_price'];
                $filteredProducts[$i]['date_stop']=$saleItem[$filteredProducts[$i]['id']]['date_stop'];
                $filteredProducts[$i]['sale']=1;
            }
            $i++;
        }
     
        
        
       
        return $filteredProducts;
    }
    public static function getProductsByCategory($category_id = NULL, $page=1) {

    $today = date('Y-m-d');
       
        $db = Db::getConnection();  
        $productsByCategory=array();
        if($category_id==FALSE){$where='';}
        else{$where='WHERE category_id='.$category_id;}

        $salesList=array();
        $bazar=$db->query('SELECT * FROM sales WHERE date_stop>'.$today);
        $i=0;
        while($row=$bazar->fetch()){
            $salesList[$i]['product_id']=$row['product_id'];
            $salesList[$i]['new_price']=$row['new_price'];
            $salesList[$i]['date_stop']=$row['date_stop'];
            $i++;
        }



        $offset=($page-1)*self::SHOW_BY_DEFAULT;    

        $result=$db->query('SELECT * FROM products '.$where
                .' ORDER BY id DESC '
                .' LIMIT '.self::SHOW_BY_DEFAULT
                .' OFFSET '.$offset);
        
  

         $i=0;

           $saleItem=array();
        foreach ($salesList as $value){
 
            $saleItem[$value['product_id']]=array("new_price"=>$value['new_price'],"date_stop"=>$value['date_stop']);
            
        }
       
      
        while($row=$result->fetch()){
            $productsByCategory[$i]['id']=$row['id'];
            $productsByCategory[$i]['in_stock']=$row['in_stock'];
            $productsByCategory[$i]['name']=$row['name'];
            $productsByCategory[$i]['category_id']=$row['category_id'];
            $productsByCategory[$i]['firm']=$row['firm'];
            $productsByCategory[$i]['price']=$row['price'];
            $productsByCategory[$i]['recomend']=$row['recomend'];
            if(array_key_exists($productsByCategory[$i]['id'],$saleItem)){
                $productsByCategory[$i]['new_price']=$saleItem[$productsByCategory[$i]['id']]['new_price'];
                $productsByCategory[$i]['date_stop']=$saleItem[$productsByCategory[$i]['id']]['date_stop'];
                $productsByCategory[$i]['sale']=1;
            }
            $i++;

        }
       
        return $productsByCategory;
    }

     public static function getProduct($id) {
        $db = Db::getConnection();
        $product=array();
        $saleItem=array();
        $salesList=array();
        $today = date('Y-m-d');
        $i=0;
        $bazar=$db->query('SELECT * FROM sales WHERE date_stop>'.$today);
         while($row=$bazar->fetch()){
            $salesList[$i]['product_id']=$row['product_id'];
            $salesList[$i]['new_price']=$row['new_price'];
            $salesList[$i]['date_stop']=$row['date_stop'];
            $i++;
        }
        foreach ($salesList as $value){
 
            $saleItem[$value['product_id']]=array("new_price"=>$value['new_price'],"date_stop"=>$value['date_stop']);
            
        }
        $result=$db->query('SELECT * FROM products WHERE id='. $id .'');
        while($row=$result->fetch(1)){
            $product['id']=$row['id'];
            $product['in_stock']=$row['in_stock'];
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
            $product['slow_resolution']=$row['slow_resolution'];
            $product['control_range']=$row['control_range'];
            $product['gimbal']=$row['gimbal'];
            $product['quality']=$row['quality'];
            $product['ease_of_use']=$row['ease_of_use'];
            $product['speed']=$row['speed'];
            $product['portability']=$row['portability'];
            $product['views']=$row['views'];
          if(array_key_exists($product['id'],$saleItem)){
                $product['new_price']=$saleItem[$product['id']]['new_price'];
                $product['date_stop']=$saleItem[$product['id']]['date_stop'];
                $product['sale']=1;
            }
       
        }
       
        $result=$db->query('UPDATE products SET views='.($product['views']+1).' WHERE id='.$product['id']); 
        


        return $product;
    }
   public static function getRecomendedProductsList() {
        $db = Db::getConnection();
        $productList=array();
        $saleItem=array();
        $salesList=array();
        $today = date('Y-m-d');
         $i=0;
        $bazar=$db->query('SELECT * FROM sales WHERE date_stop>'.$today);
         while($row=$bazar->fetch()){
            $salesList[$i]['product_id']=$row['product_id'];
            $salesList[$i]['new_price']=$row['new_price'];
            $salesList[$i]['date_stop']=$row['date_stop'];
            $i++;
        }
        foreach ($salesList as $value){
 
            $saleItem[$value['product_id']]=array("new_price"=>$value['new_price'],"date_stop"=>$value['date_stop']);
            
        }
        $result=$db->query('SELECT * FROM products WHERE recomend=1 AND in_stock=1 ORDER BY id DESC LIMIT 7');
     
        while($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['firm']=$row['firm'];
            $productList[$i]['price']=$row['price'];
            if(array_key_exists($productList[$i]['id'],$saleItem)){
                 $productList[$i]['new_price']=$saleItem[$productList[$i]['id']]['new_price'];
                 $productList[$i]['date_stop']=$saleItem[$productList[$i]['id']]['date_stop'];
                 $productList[$i]['sale']=1;
            }
            $i++;
        }
        return $productList;
    }
    
     public static function getPromotionsList() {
        $db = Db::getConnection();
        $promotionList=array();
        $result=$db->query('SELECT * FROM promotion ORDER BY id DESC LIMIT 5');
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
      public static function getSalesList() {
           $today = date('Y-m-d');
        $db = Db::getConnection();
        $salesList=array();
        $result=$db->query('SELECT products.id as prod_id, products.name, products.firm, products.price, sales.new_price, sales.date_stop, sales.id as sales_id FROM products INNER JOIN sales  ON products.id=sales.product_id  ORDER BY sales.id DESC');
        $i=0;
        while($row=$result->fetch()){
            if(strtotime($row['date_stop'])>strtotime($today)){
           $salesList[$i]['sales_id']=$row['sales_id'];
           $salesList[$i]['prod_id']=$row['prod_id'];
           $salesList[$i]['name']=$row['name'];
           $salesList[$i]['firm']=$row['firm'];
           $salesList[$i]['price']=$row['price'];
           $salesList[$i]['new_price']=$row['new_price'];
           $salesList[$i]['date_stop']=date("d F", strtotime($row['date_stop']));
            }
           $i++;
        }
        
        return $salesList;
    }
    public static function getSearchedProducts($page=1) {
        $db = Db::getConnection();
            $today = date('Y-m-d');
          if (isset($_POST['searched_products'])) {
            $likeQuery=$_POST['searched_products'];
            $likeQuery= trim($likeQuery);
            $likeQuery= strip_tags($likeQuery);
        }
       $salesList=array();
        $bazar=$db->query('SELECT * FROM sales WHERE date_stop>'.$today);
        $i=0;
        while($row=$bazar->fetch()){
            $salesList[$i]['product_id']=$row['product_id'];
            $salesList[$i]['new_price']=$row['new_price'];
            $salesList[$i]['date_stop']=$row['date_stop'];
            $i++;
        }
        foreach ($salesList as $value){
 
            $saleItem[$value['product_id']]=array("new_price"=>$value['new_price'],"date_stop"=>$value['date_stop']);
            
        }

        
         $offset=($page-1)*self::SHOW_BY_DEFAULT;   
       
       
        $sqlQuery='SELECT * from products WHERE firm LIKE ? OR name LIKE ?  LIMIT '.self::SHOW_BY_DEFAULT.' OFFSET '.$offset.'';
        $result=$db->prepare($sqlQuery);
        $params = array("%$likeQuery%","%$likeQuery%");
    
       
      
$filteredProducts=array();
           $result->execute($params);
           $i=0;
        while ($row = $result->fetch()) {
             $filteredProducts[$i]['id']=$row['id'];
            $filteredProducts[$i]['in_stock']=$row['in_stock'];
            $filteredProducts[$i]['name']=$row['name'];
            $filteredProducts[$i]['category_id']=$row['category_id'];
            $filteredProducts[$i]['firm']=$row['firm'];
            $filteredProducts[$i]['price']=$row['price'];
            $filteredProducts[$i]['recomend']=$row['recomend'];
            if(array_key_exists($filteredProducts[$i]['id'],$saleItem)){
                $filteredProducts[$i]['new_price']=$saleItem[$filteredProducts[$i]['id']]['new_price'];
                $filteredProducts[$i]['date_stop']=$saleItem[$filteredProducts[$i]['id']]['date_stop'];
                $filteredProducts[$i]['sale']=1;
            }
            $i++;
        }
     
        
        
       
        return $filteredProducts;
    }
     public static function getCountSearched() {
            $today = date('Y-m-d');
            $db = Db::getConnection();
          if (isset($_POST['searched_products'])) {
            $likeQuery=$_POST['searched_products'];
            $likeQuery= trim($likeQuery);
            $likeQuery= strip_tags($likeQuery);
        }
   
       
       
        $sqlQuery='SELECT COUNT(*) AS count from products WHERE firm LIKE ? OR name LIKE ? ';
        $result=$db->prepare($sqlQuery);
        $params = array("%$likeQuery%","%$likeQuery%");
    

           $result->execute($params);

        while ($row = $result->fetch()) {
             $filteredProducts=$row['count'];

        }
     
        
        
       
        return $filteredProducts;
    }
}
