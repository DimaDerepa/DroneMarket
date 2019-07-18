<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductController
 *
 * @author mc_Dimas
 */


class ProductController {
    public function actionView($id) {
         Comments::deleteComment();
        Comments::saveCommentProduct($id);
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $commentsInfo= Comments::getProductComments($id);
         $username= User::getUserName();
         User::SaveEmail();
         $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        $categories=array();
        $categories=Category::getCategoriesList();
        $product=array();
        $product= Product::getProduct($id);
        $products=array();
        $products= Product::getRecomendedProductsList();
        $blogCategories=array();
        $blogCategories= BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/product/view.php');

        return true;
        
    }
}
