<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdditionalController
 *
 * @author mc_Dimas
 */
class AdditionalController {
        public function actionFaqs() {
         User::SaveEmail();
         $username= User::getUserName();
         $productsCart=Cart::ProductsinCart();
        $totall=Cart::total();


        $authors= BlogArticles::getAuthorName();

        $comments= BlogArticles::getCountComments();

        $products= Product::getRecomendedProductsList();
 
        $categories=Category::getCategoriesList();

        $blogCategories=BlogArticles::getBlogCategoriesList();

        require_once(ROOT . '/views/additional/faqs.php');

        return true;
    }
    public function actionShipping() {
         User::SaveEmail();
         $username= User::getUserName();
         $productsCart=Cart::ProductsinCart();
        $totall=Cart::total();


        $authors= BlogArticles::getAuthorName();

        $comments= BlogArticles::getCountComments();

        $products= Product::getRecomendedProductsList();
 
        $categories=Category::getCategoriesList();

        $blogCategories=BlogArticles::getBlogCategoriesList();

        require_once(ROOT . '/views/additional/shipping.php');

        return true;
    }
     public function actionAbout() {
         User::SaveEmail();
         $username= User::getUserName();
         $productsCart=Cart::ProductsinCart();
        $totall=Cart::total();


        $authors= BlogArticles::getAuthorName();

        $comments= BlogArticles::getCountComments();

        $products= Product::getRecomendedProductsList();
 
        $categories=Category::getCategoriesList();

        $blogCategories=BlogArticles::getBlogCategoriesList();

        require_once(ROOT . '/views/additional/about.php');

        return true;
    }
     public function actionContact() {
         User::SaveEmail();
         $username= User::getUserName();
         $productsCart=Cart::ProductsinCart();
        $totall=Cart::total();


        $authors= BlogArticles::getAuthorName();

        $comments= BlogArticles::getCountComments();

        $products= Product::getRecomendedProductsList();
 
        $categories=Category::getCategoriesList();

        $blogCategories=BlogArticles::getBlogCategoriesList();

        require_once(ROOT . '/views/additional/contact.php');

        return true;
    }
}
