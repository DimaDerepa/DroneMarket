<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteController
 *
 * @author mc_Dimas
 * 
 * 
 */



class SiteController {

    public function actionIndex() {
        User::SaveEmail();
           $username= User::getUserName();
        $sales= Product::getSalesList(2);
         $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        $articles= BlogArticles::getOurBlogArticles();
        $products= Product::getRecomendedProductsList();
        $promotions= Product::getPromotionsList();
        $categories=Category::getCategoriesList();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $instagramPhotos= instagram::Last5PhotosFromInst();


        require_once(ROOT . '/views/site/index.php');
        return true;
        
    }
     
}
