<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author mc_Dimas
 */
class Cart {
    public static function addProduct($id){
        $id=intval($id);
        $productsInCart=array();
        if(isset($_SESSION['products'])){
            $productsInCart=$_SESSION['products'];
        }
        if(array_key_exists($id, $productsInCart)){
            $productsInCart[$id]++;
        } else {
        $productsInCart[$id]=1;
        }
        $_SESSION['products']=$productsInCart;

        return self::CartCount();
    }
    public static function deleteFromCart(){
        if(isset($_POST['delete_from_cart'])){
            $id=$_POST['deleted_id'];
            unset($_SESSION['products'][$id]);

        return true;
        }
        return FALSE;
    }
        public static function createOrder(){
        if(isset($_POST['create_order'])){
             $db= Db::getConnection();
            $list=$_POST['list'];
            $phone=$_POST['phone'];
            $name=$_POST['name'];
          $query="INSERT INTO orderlist(list,name,phone) VALUES (:list, :name, :phone)";
           
        $result=$db->prepare($query);
        $result->bindValue(':list', $list);
        $result->bindValue(':name', $name);
        $result->bindValue(':phone', $phone);
        $result->execute();
        unset($_SESSION['products']);

        return true;
        }
        return FALSE;
    }
    public static function clearCart(){
        if(isset($_POST['clear_cart'])){
            
            unset($_SESSION['products']);

        return true;
        }
        return FALSE;
    }

    public static function CartCount() {
        if(isset($_SESSION['products'])){
           $countInCart=array_sum($_SESSION['products']);
            
        } else {
            $countInCart=0;
            
        }
        return $countInCart;

}

public static function ProductsinCart() {
    if (isset($_SESSION['products'])){
        $today = date('Y-m-d');
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

         $productsCart=$_SESSION['products'];
         $i=0;
                 $cartItems=array();
                 $totalPrice=0;
         foreach ($productsCart as $key => $value) {
             $result=$db->query('SELECT * FROM products WHERE id='.$key);
             while($row=$result->fetch()){
            $cartItems[$i]['name']=$row['name'];
            $cartItems[$i]['id']=$key;
            $cartItems[$i]['count']=$value;
            $cartItems[$i]['firm']=$row['firm'];
            $cartItems[$i]['price']=$row['price'];
            $cartItems[$i]['total']=intval($row['price'])*intval($value);
            $totalPrice=+$cartItems[$i]['total'];
            if(array_key_exists($cartItems[$i]['id'],$saleItem)){
                $cartItems[$i]['new_price']=$saleItem[$cartItems[$i]['id']]['new_price'];
                $cartItems[$i]['date_stop']=$saleItem[$cartItems[$i]['id']]['date_stop'];
                $cartItems[$i]['sale']=1;
                $cartItems[$i]['total']=0;
                $cartItems[$i]['total']=intval($saleItem[$cartItems[$i]['id']]['new_price'])*intval($value);
            }
             $i++;
             }
          
              
         }
        
         
   
}
 else {
    $cartItems=array();
}
return $cartItems ;
}
public static function total() {
   if (isset($_SESSION['products'])){
         $db = Db::getConnection();

         $productsCart=$_SESSION['products'];
         $i=0;
                 $cartItems=array();
                 $totalPrice=0;
         foreach ($productsCart as $key => $value) {
             $result=$db->query('SELECT * FROM products WHERE id='.$key);
             while($row=$result->fetch()){
            $cartItems[$i]['name']=$row['name'];
            $cartItems[$i]['id']=$key;
            $cartItems[$i]['count']=$value;
            $cartItems[$i]['firm']=$row['firm'];
            $cartItems[$i]['price']=$row['price'];
            $cartItems[$i]['total']=intval($row['price'])*intval($value);
            $totalPrice=$totalPrice+$cartItems[$i]['total'];
           
             $i++;
             }
          
              
         }
        
       return $totalPrice;
   
}
 
return FALSE;
}
}
