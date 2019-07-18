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
    public function actionView(){
        Cart::createOrder();
        Cart::deleteFromCart();
        Cart::clearCart();
         $productsCart=Cart::ProductsinCart();
          
        $totall=Cart::total();
    
        User::SaveEmail();
        $username= User::getUserName();
        $articles= Configurations::getProposedArticles();
        $aplied= Configurations::appliedArticles();
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
 
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/profile/cart.php');

        return true;
    }

}
