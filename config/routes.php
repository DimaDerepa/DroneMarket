<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
 
    
    'category/(all)/filtered/page-([0-9]+)'=>'category/filter/$1/$2',
    'category/(all)/filtered'=>'category/filter/$1',
    'category/([0-9]+)/filtered/page-([0-9]+)'=>'category/filter/$1/$2',
    'category/([0-9]+)/filtered'=>'category/filter/$1',
    
    'category/(all)/page-([0-9]+)'=>'category/index/$1/$2',
    'category/(all)'=>'category/index/$1',
    'category/([0-9]+)/page-([0-9]+)'=>'category/index/$1/$2',
    'category/([0-9]+)'=>'category/index/$1',
    
    'category/searched'=>'category/search',
    'category/searched/page-([0-9]+)'=>'category/search/$1',
    
    'blog/(all)/page-([0-9]+)'=>'blog/index/$1/$2',
    'blog/(all)'=>'blog/index/$1',
    'blog/([0-9]+)/page-([0-9]+)'=>'blog/index/$1/$2',
    'blog/([0-9]+)'=>'blog/index/$1',
    
    'blog/search'=>'blog/search',
    'blog/search/page-([0-9]+)'=>'blog/search/$1',
    
    
    'article/([0-9]+)'=>'blog/view/$1',
    
    'configurations/orders'=>'configurations/orders',
    'configurations/products'=>'configurations/products',
    'configurations/articles'=>'configurations/articles',
    'configurations/promotions'=>'configurations/promotions',
    'configurations/sale'=>'configurations/sale',
    'configurations/proposed'=>'configurations/proposed',
    'configurations/mailing'=>'configurations/mailing',
    'configurations/contacts'=>'configurations/contacts',
    'configurations'=>'configurations/index',
    'bigcart'=>'cart/view',
    'faqs'=>'additional/faqs',
    'shipping'=>'additional/shipping',
    'about'=>'additional/about',
    'contact'=>'additional/contact',
    

    
    
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