<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigurationsController
 *
 * @author mc_Dimas
 */
class ConfigurationsController {
    public function actionOrders() {
        Configurations::updateOrder();
        $prodAll= Product::getProductsVse();
        $orders=Configurations::getOrders();
         $productsCart=Cart::ProductsinCart();
         
 $totall=Cart::total();
        User::checkAdmin();
        User::SaveEmail();
 $username= User::getUserName();
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
        require_once(ROOT . '/views/configurations/orders.php');
        return true;
        
    }
     public function actionIndex() {
         $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        User::checkAdmin();
        User::SaveEmail();
 $username= User::getUserName();
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
        require_once(ROOT . '/views/configurations/index.php');
        return true;
        
    }
    
    public function actionContacts() {
        $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        User::checkAdmin();
        $username= User::getUserName();
        if (Configurations::changeContacts()) {
            header("Location: /configurations");
        }
        $authors=array();
        User::SaveEmail();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
 
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/configurations/contacts.php');
        
        return true;
        
    }
        public function actionMailing() {
            $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        User::checkAdmin();
        $username= User::getUserName();
        if(isset($_POST['submit'])){
           $emails=Configurations::getEmails($_POST['recipients']);
        

            $from = "post@dronemarket.zzz.com.ua";
           
                $to='"'.implode("\",\"", $emails).'"';
                $subject = $_POST['headline'];

                 $message = $_POST['text'];

                 $headers =  'From: post@dronemarket.zzz.com.ua ' ;

                mail($to,$subject,$message, $headers);
                header("Location: /configurations");
                 
                
          
        
        }
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
        require_once(ROOT . '/views/configurations/mailing.php');
        
        return true;
        
    }
       public function actionSale() {
            Configurations::CreateNewSale();
          Configurations::DeleteSale();
         $productsCart=Cart::ProductsinCart();
          $prodlist=Product::getProductsALL();
          $saleslist= Product::getSalesList();
         
 $totall=Cart::total();
        User::checkAdmin();
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
        require_once(ROOT . '/views/configurations/sale.php');
    
        return true;
        
    }
     public function actionProposed() {
               $aplied= Configurations::appliedArticles();
         $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        User::checkAdmin();
        User::SaveEmail();
        $username= User::getUserName();
        $articles= Configurations::getProposedArticles();
  
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
        require_once(ROOT . '/views/configurations/proposed.php');
        
        return true;
        
    }
    public function actionPromotions() {
             Configurations::CreateNewPromotion();
             Configurations::ChangePromotion();
            $prodlist=Product::getProductsALL();
        $lastid= Configurations::getLastPromotionId();
   
        $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        User::checkAdmin();
        $username= User::getUserName();
        $currentPromotions= Configurations::getPromotionsList();
       User::SaveEmail();
      
        
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/configurations/promotions.php');
   
        
        return true;
        
    }
    public function actionProducts() {
         Configurations::DeleteProduct();
         $result= Configurations::CreateNewProduct();
        $all= Product::getProductsALL();
       
        $productsCart=Cart::ProductsinCart();
 $totall=Cart::total();
        User::checkAdmin();
        $username= User::getUserName();
        $currentPromotions= Configurations::getPromotionsList();
       User::SaveEmail();
       $lastid= Configurations::getLastProductId();
         
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/configurations/products.php');


        return true;
        
    }
     public function actionArticles() {
           Configurations::DeleteArticle();
         Configurations::CreateNewArticle();
         $all= BlogArticles::geALLArticles();
       
         $productsCart=Cart::ProductsinCart();
        
 $totall=Cart::total();
        User::checkAdmin();
        $username= User::getUserName();
        $currentPromotions= Configurations::getPromotionsList();
       
      User::SaveEmail();
        
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/configurations/articles.php');
        
        return true;
        
    }
}
