<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author mc_Dimas
 */
class Category {
    
    public static function getCategoriesList() {
        $db = Db::getConnection();
        $categoryList=array();
        $result=$db->query('SELECT * FROM categories ORDER BY id ASC');
        $i=0;
        while($row=$result->fetch()){
            $categoryList[$i]['id']=$row['id'];
            $categoryList[$i]['name']=$row['name'];
            $i++;
        }
        return $categoryList;
    }
    
  
}
