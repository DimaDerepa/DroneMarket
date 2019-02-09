<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'shop/page-([0-9]+)'=>'category/view/$1',
    'shop'=>'category/index',
    
    'category/([0-9]+)/page-([0-9]+)'=>'category/index/$1/$2',
    'category/([0-9]+)'=>'category/index/$1',
    

    'blog/([0-9]+)'=>'blog/view/$1',
    'blog'=>'blog/index',
    
    'product/([0-9]+)'=>'product/view/$1',
 
    'user/login'=>'user/login',
    'user/logout'=>'user/logout',
    'user/registration'=>'user/registration',
    
    'profile'=>'profile/index',
    
    'cart/add/([0-9]+)'=>'cart/add/$1',
    'cart/delete/([0-9]+)'=>'cart/delete/$1',
    
    'contacts'=>'site/contact',
    
    ''=>'site/index',
    
);