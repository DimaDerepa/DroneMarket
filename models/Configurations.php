<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configurations
 *
 * @author mc_Dimas
 */
class Configurations {
   public static function changeContacts() {
       
        if(isset($_POST['submit'])){
            $contacts['mail']=$_POST['mail'];
            $contacts['adress']=$_POST['adress'];
            $contacts['phone']=$_POST['phone'];
            $contacts['youtube']=$_POST['youtube'];
            $contacts['facebook']=$_POST['facebook'];
            $contacts['instagram']=$_POST['instagram'];

           $filename = ROOT . '/config/contacts.php';
                $file = file($filename);
                $file[2] ='\'mail\'=>\''.$contacts['mail'].'\','.PHP_EOL;
                $file[3] ='\'phone\'=>\''.$contacts['phone'].'\','.PHP_EOL;
                $file[4] ='\'adress\'=>\''.$contacts['adress'].'\','.PHP_EOL;
                $file[5] ='\'youtube\'=>\''.$contacts['youtube'].'\','.PHP_EOL;
                $file[6] ='\'facebook\'=>\''.$contacts['facebook'].'\','.PHP_EOL;
                $file[7] ='\'instagram\'=>\''.$contacts['instagram'].'\',);';


                file_put_contents($filename, $file);
                return true;
        }
        return false;
   }
   public static function getEmails($recipients) {
        $db= Db::getConnection();
        $emailsRecipients=array();
       if ($recipients=='subscribers'){
              $result=$db->query('SELECT email FROM subscribers');
            while ($row =$result->fetch()) {
                $emailsRecipients[]=$row['email'];
            }
            return $emailsRecipients;
            
            
        } elseif ($recipients=='users') {
        $result=$db->query('SELECT email FROM users');
            while ($row =$result->fetch()) {
                $emailsRecipients[]=$row['email'];
            }
             return $emailsRecipients;
        } elseif ($recipients=='all') {
            $result=$db->query('SELECT email FROM users');
            while ($row =$result->fetch()) {
                $emailsRecipients[]=$row['email'];
            }
             
            
            $resultSecond=$db->query('SELECT email FROM subscribers');
            while ($row =$resultSecond->fetch()) {
                $emailsRecipients[]=$row['email'];
            }
             return $emailsRecipients;
    
        }
        return false;
   }
    public static function getProposedArticles() {
       $db = Db::getConnection();
       $proposedArticles=array();
       $result=$db->query('SELECT * FROM proposed_articles ORDER BY id DESC');
        $i=0;
        while($row=$result->fetch()){

            $proposedArticles[$i]['id']=$row['id'];
            $proposedArticles[$i]['category_id']=$row['category_id'];
            $proposedArticles[$i]['title']=$row['title'];
            $proposedArticles[$i]['text']=$row['text'];
            $proposedArticles[$i]['author_id']=$row['author_id'];
            $i++;
            

        }
        return  $proposedArticles;
    }
     public static function appliedArticles() {
         if (isset($_POST['submit'])){
             $db = Db::getConnection();
         
            $applied=array_keys($_POST,"on");
            if($applied==NULL){
                $queryT='truncate table proposed_articles';
      $resultT=$db->prepare($queryT);
      $resultT->execute();
      header("Location: /configurations");
            }else{
            $applied=   implode(",", $applied);
          
            $result=$db->query('SELECT * FROM proposed_articles WHERE id IN('.$applied.')');
             $i=0;
        while($row=$result->fetch()){

            $appliedArticles[$i]['id']=$row['id'];
            $appliedArticles[$i]['category_id']=$row['category_id'];
            $appliedArticles[$i]['title']=$row['title'];
            $appliedArticles[$i]['text']=$row['text'];
            $appliedArticles[$i]['author_id']=$row['author_id'];
          
           $queryS='INSERT INTO articles (category_id, title, text, author_id) VALUES (:category_id, :title, :text, :author_id)';
                
        
            $resultS=$db->prepare($queryS);
            $resultS->bindParam(':category_id', $appliedArticles[$i]['category_id'], PDO::PARAM_STR);
            $resultS->bindParam(':title', $appliedArticles[$i]['title'], PDO::PARAM_STR);
            $resultS->bindParam(':text', $appliedArticles[$i]['text'], PDO::PARAM_STR);
            $resultS->bindParam(':author_id', $appliedArticles[$i]['author_id'], PDO::PARAM_STR);
            $resultS->execute();
            
            $i++;
         }

      $queryT='truncate table proposed_articles';
      $resultT=$db->prepare($queryT);
      $resultT->execute();
      header("Location: /configurations");
         
       }
         }

     
}
     public static function getPromotionsList() {
        $db = Db::getConnection();
        $promotionList=array();
        $result=$db->query('SELECT * FROM promotion ORDER BY id DESC');
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
     public static function getUsers() {
        $db = Db::getConnection();
        $userList=array();
        $result=$db->query('SELECT * FROM users ORDER BY id DESC');
        $i=0;
        while($row=$result->fetch()){
            $userList[$i]['id']=$row['id'];
            $userList[$i]['nickname']=$row['nickname'];
            $userList[$i]['email']=$row['email'];
            $userList[$i]['registration_date']=date("d-m-Y", strtotime($row['registration_date']));

            $i++;
        }
        return $userList;
    }
         public static function getOrders() {
        $db = Db::getConnection();
        $userList=array();
        $result=$db->query('SELECT * FROM orderlist ORDER BY id DESC');
        $i=0;
        while($row=$result->fetch()){
            $userList[$i]['id']=$row['id'];
            $userList[$i]['list']=$row['list'];
            $userList[$i]['name']=$row['name'];
             $userList[$i]['phone']=$row['phone'];
             $userList[$i]['status']=$row['status'];
              $userList[$i]['last_update']=date("d-m-Y", strtotime($row['last_update'])); 
            

            $i++;
        }
        return $userList;
    }
     public static function getUsersOrders() {
        $db = Db::getConnection();

        $id=$_SESSION['user'];
        $name=$db->query('SELECT * FROM users WHERE id='.$id);
        while($row1=$name->fetch(1)){
            $username['nickname']=$row1['nickname'];

        }
        $result=$db->prepare('SELECT * FROM orderlist WHERE name=:name');
         $result->bindValue(':name', $username['nickname']);
      
        $result->execute();
       
        $i=0;
        while($row2=$result->fetch()){
            $userList[$i]['id']=$row2['id'];
            $userList[$i]['list']=$row2['list'];
            $userList[$i]['name']=$row2['name'];
             $userList[$i]['phone']=$row2['phone'];
             $userList[$i]['status']=$row2['status'];
              $userList[$i]['last_update']=date("d-m-Y", strtotime($row2['last_update'])); 
            

            $i++;
        }
        return $userList;
    }
      public static function getLastPromotionId() {
        $db = Db::getConnection();
        
        $result=$db->query('SELECT MAX(id) AS max FROM promotion');
  
        while($row=$result->fetch()){
            $userList=$row['max'];
       

        }
        return $userList;
    }
        public static function getLastProductId() {
        $db = Db::getConnection();
        
        $result=$db->query('SELECT MAX(id) AS max FROM products');
  
        while($row=$result->fetch()){
            $userList=$row['max'];
       

        }
        return $userList;
    }
    public static function getLastArticleId() {
        $db = Db::getConnection();
        
        $result=$db->query('SELECT MAX(id) AS max FROM articles');
  
        while($row=$result->fetch()){
            $userList=$row['max'];
       

        }
        return $userList;
    }
      public static function CreateNewSale() {
         if(isset($_POST['new_price'])){
          $new_price=$_POST['new_price'];
            $id=$_POST['id'];
              $date=$_POST['date'];
          $datenew=substr($date, 0, 4).'-'.substr($date, 5, 7).'-'.substr($date, 7, 9);
            $datenew=substr($datenew, 0, 10);
        $db = Db::getConnection();
        $query="INSERT INTO sales(product_id, new_price, date_stop) VALUES (:prod, :price, :date)";
           
        $result=$db->prepare($query);
        $result->bindValue(':prod', $id);
        $result->bindValue(':price', $new_price);
        $result->bindValue(':date', $datenew);
        $result->execute();
         return  TRUE;
       }
           return False;
        }
        public static function DeleteSale() {
         if(isset($_POST['deleted_id'])){
          $prod=$_POST['deleted_id'];
        $db = Db::getConnection();
        $query="DELETE FROM sales WHERE product_id=:prod";
           
        $result=$db->prepare($query);
        $result->bindValue(':prod', $prod);

        $result->execute();
         return  TRUE;
       }
           return False;
        }
         public static function DeleteProduct() {
         if(isset($_POST['deleted_id'])){
          $prod=$_POST['deleted_id'];
        $db = Db::getConnection();
        $query="DELETE FROM products WHERE id=:prod";
           
        $result=$db->prepare($query);
        $result->bindValue(':prod', $prod);

        $result->execute();
         return  TRUE;
       }
           return False;
        }
         public static function CreateNewArticle() {
         if(isset($_POST['submit_article'])){
               $id= Configurations::getLastArticleId()+1;
   
             $title=$_POST['title'];
      
             $category=$_POST['category_id'];
             $text=$_POST['text'];
               if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmpFile = $_FILES['wrapper']['tmp_name'];
    $newFile = ROOT.'/template/images/articles/'.$id.'.jpg';
    $resultd = move_uploaded_file($tmpFile, $newFile);
}
            
            
        $db = Db::getConnection();
       $query="INSERT INTO articles(category_id,title,text,author_id) VALUES (:category, :title, :text, 1)";
           
        $result=$db->prepare($query);
        $result->bindValue(':category', $category);
        $result->bindValue(':title', $title);
        $result->bindValue(':text', $text);
        $result->execute();

         return TRUE;
       }
           return False;
        }
         public static function proposeNewArticle() {
         if(isset($_POST['submit_article'])){
               $id= Configurations::getLastArticleId()+1;
               $user=$_SESSION['user'];
             $title=$_POST['title'];
      
             $category=$_POST['category_id'];
             $text=$_POST['text'];

            
        $db = Db::getConnection();
       $query="INSERT INTO proposed_articles(category_id,title,text,author_id) VALUES (:category, :title, :text, :user)";
           
        $result=$db->prepare($query);
        $result->bindValue(':category', $category);
        $result->bindValue(':title', $title);
        $result->bindValue(':text', $text);
        $result->bindValue(':user', $user);
        $result->execute();

         return TRUE;
       }
           return False;
        }
            public static function DeleteArticle() {
         if(isset($_POST['delete_article'])){
          $id=$_POST['delete_id'];
        $db = Db::getConnection();
        $query="DELETE FROM articles WHERE id=:id";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);

        $result->execute();
         return  TRUE;
       }
           return False;
        }
      public static function CreateNewProduct() {
         if(isset($_POST['add_product'])){
              $id= Configurations::getLastProductId()+1;
             $firm=$_POST['firm'];
             $name=$_POST['name'];
             $category=$_POST['category'];
             $price=$_POST['price'];
             $code=$_POST['code'];
             $in_stock=$_POST['in_stock'];
             $description=$_POST['description'];
             $specification=$_POST['specification'];
            $flight_time=$_POST['flight_time'];
               $camera_avaliable=$_POST['camera_avaliable'];
                $camera_resolution=$_POST['camera_resolution'];
                $slow_resolution=$_POST['slow_resolution'];
                $video_resolution=$_POST['video_resolution'];
                 $control_range=$_POST['control_range'];
                  $gimbal=$_POST['gimbal'];
                   $quality=$_POST['quality'];
                    $easy_of_use=$_POST['easy_of_use'];
                    $speed=$_POST['speed'];
                    $portability=$_POST['portability'];
                    $recomend=$_POST['recomend'];
                    $sale=$_POST['sale'];
            
            
             
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmpFileMain = $_FILES['1']['tmp_name'];
     $tmpFileSecond = $_FILES['2']['tmp_name'];
      $tmpFileThird = $_FILES['3']['tmp_name'];
      foreach ($_FILES['add']['tmp_name'] as $key=>$value) {
           $add[$key]=$value;
      }
     $dir= ROOT.'/template/images/products/'.$id;
    if(!file_exists($dir)){
        mkdir(ROOT.'/template/images/products/'.$id, 0777, TRUE);
    }
    $dir= ROOT.'/template/images/products/'.$id;
    $newFileMain = ROOT.'/template/images/products/'.$id.'/1.jpg';
    $newFileSecond = ROOT.'/template/images/products/'.$id.'/2.jpg';
    $newFileThird = ROOT.'/template/images/products/'.$id.'/3.jpg';
     foreach ($add as $key=>$value) {
         $dir2=$dir.'/add'.($key+1).'.jpg';
          move_uploaded_file($value, $dir2);
           
      }
     move_uploaded_file($tmpFileMain, $newFileMain);
      move_uploaded_file($tmpFileSecond, $newFileSecond);
       move_uploaded_file($tmpFileThird, $newFileThird);
}
            
        $db = Db::getConnection();
       $query="INSERT INTO products"
               . " (id,firm,name,category_id,price,code,in_stock,description,specification,flight_time,camera_availability,camera_resolution,slow_resolution,video_resolution,control_range,gimbal,quality,ease_of_use,speed,portability,recomend,sale) "
               . "VALUES"
               . " (:id, :firm, :name, :category, :price, :code, :in_stock, :description, :specification, :flight_time, :camera_availability, :camera_resolution, :slow_resolution, :video_resolution, :control_range, :gimbal, :quality, :ease_of_use, :speed, :portability, :recomend, :sale)";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);
        $result->bindValue(':firm', $firm);
        $result->bindValue(':name', $name);
        $result->bindValue(':category', $category);
        $result->bindValue(':price', $price);
        $result->bindValue(':code', $code);
        $result->bindValue(':in_stock', $in_stock);
        $result->bindValue(':description', $description);
        $result->bindValue(':specification', $specification);
        $result->bindValue(':flight_time', $flight_time);
        $result->bindValue(':camera_availability', $camera_avaliable);
        $result->bindValue(':camera_resolution', $camera_resolution);
        $result->bindValue(':slow_resolution', $slow_resolution);
        $result->bindValue(':video_resolution', $video_resolution);
        $result->bindValue(':control_range', $control_range);
        $result->bindValue(':gimbal', $gimbal);
        $result->bindValue(':quality', $quality);
        $result->bindValue(':ease_of_use', $easy_of_use);
        $result->bindValue(':speed', $speed);
        $result->bindValue(':portability', $portability);
        $result->bindValue(':recomend', $recomend);
        $result->bindValue(':sale', $sale);
        $result->execute();

         return TRUE;
       }
           return False;
        }
    
     public static function CreateNewPromotion() {
         if(isset($_POST['big_line'])){
             $id= Configurations::getLastPromotionId()+1;
             $big_line=$_POST['big_line'];
             $small_line=$_POST['small_line'];
             $button_content=$_POST['button_content'];
             $product_id=$_POST['product_id'];
             
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmpFile = $_FILES['wrapper']['tmp_name'];
    $newFile = ROOT.'/template/images/promotions/'.$id.'.jpg';
    $resultd = move_uploaded_file($tmpFile, $newFile);
}
     
        $db = Db::getConnection();
       $query="INSERT INTO promotion(id,product,button_content,small_line,big_line) VALUES (:id,:product,:button_content,:small_line,:big_line)";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);
        $result->bindValue(':product', $product_id);
        $result->bindValue(':button_content', $button_content);
        $result->bindValue(':small_line', $small_line);
        $result->bindValue(':big_line', $big_line);
        $result->execute();
     
       
         return TRUE;
       }
      return FALSE;
     }
          public static function ChangePromotion() {
                $db = Db::getConnection();
         if(isset($_POST['do']) && $_POST['do']==1){
             $id=$_POST['change_id'] ;
             $big_line=$_POST['change_big'];
             $small_line=$_POST['change_small'];
             $button_content=$_POST['change_button'];
  
       $query="UPDATE promotion SET button_content=:button_content, small_line=:small_line, big_line=:big_line WHERE id=:id";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);
    
        $result->bindValue(':button_content', $button_content);
        $result->bindValue(':small_line', $small_line);
        $result->bindValue(':big_line', $big_line);
        $result->execute();
     
       
         return TRUE;
       }elseif(isset($_POST['do']) && $_POST['do']==0){
             $id=$_POST['change_id'] ;
            
  
       $query="DELETE FROM promotion WHERE id=:id";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);
 
        $result->execute();
     
       
         return TRUE;
       }
      return FALSE;
     }
        public static function updateOrder() {
                $db = Db::getConnection();
         if(isset($_POST['submit_order'])){
             $id=$_POST['id'];
             $new_status=$_POST['new_status'] ;
            
  
       $query="UPDATE orderlist SET status=:new_status WHERE id=:id  ";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $id);
    
        $result->bindValue(':new_status', $new_status);

        $result->execute();
     
       
         return TRUE;
       }
      return FALSE;
     }
  
}