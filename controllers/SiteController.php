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
        $instagramPhotos=array();
        $instagramPhotos= instagram::Last5PhotosFromInst();
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $articles=array();
        $articles= BlogArticles::getOurBlogArticles();
        $products=array();
        $products= Product::getRecomendedProductsList();
        $promotions=array();
        $promotions= Product::getPromotionsList();
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/site/index.php');
        return true;
        
    }
     public function actionContact() {
        $to= 'dimaderepa1997@gmail.com';
$subject = 'the subject';
$message = 'hello';

$result= mail($to, $subject, $message);
        var_dump($result);
        die;
    
        
    }
}
