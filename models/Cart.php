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
            $totalPrice=+$cartItems[$i]['total'];
           
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
        
         
   
}
 
return $totalPrice ;
}
}
