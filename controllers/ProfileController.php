<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileController
 *
 * @author mc_Dimas
 */
class ProfileController {
    public function actionIndex() {
        $userId= User::checkLogged();
        echo $userId;
          
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/profile/index.php');
        return true;
    }
}
