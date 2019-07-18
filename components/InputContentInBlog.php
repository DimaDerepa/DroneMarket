<?php


class InputContentInBlog {
     public static function replacer($text,$idArticle){

        $string=$text;
        $finded= preg_match_all("/!!product ([1-9]+)!!/", $string , $out);
        $id=array();
        $correctOut=array();  
        foreach ($out[0] as $value){
            $correctOut[]=substr($value, 0, 0)."/".substr($value, 0, 13)."/";
            $id[]= substr($value, 10, 1);
        }
        $replacement=array();
        foreach ($id as $idItem){
            $replacement[]='<img src="/template/images/products/'.$idItem.'/1.jpg" id="blog_additional">'
                    . '<a href="/product/'.$idItem.'" class="blog_button">View product</a><br><br>';
        }
        $string=preg_replace($correctOut, $replacement, $string);

        $finded= preg_match_all("/!!photo ([1-9]+)!!/", $string , $outSecond);
        $number=array();
        $correctOutSecond=array();  
        foreach ($outSecond[0] as $value){
            $correctOutSecond[]=substr($value, 0, 0)."/".substr($value, 0, 11)."/";
            $number[]= substr($value, 8, 1);
        }
        $replacementS=array();
        foreach ($number as $numItem){
            $replacementS[]='<img src="/template/images/articles/'.$idArticle.'/'.($numItem+1).'.jpg" id="blog_additional_photo">';
        }
        $string=preg_replace($correctOutSecond, $replacementS, $string);
        
        return $string;
            
    }
    
}
