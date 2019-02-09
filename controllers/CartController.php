<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CartController
 *
 * @author mc_Dimas
 */
class CartController {
    public function actionAdd($id){
        
        echo Cart::addProduct($id);
   
        $productsCart=Cart::ProductsinCart();
        return TRUE;
    }

}
