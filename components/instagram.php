<?php

class instagram {
   public static function Last5PhotosFromInst(){
       $z=array();
        $contents = file_get_contents(ROOT . '/components/instagram.json'); 
  
        $res = json_decode($contents, true);
        if (!empty($res['data'])) {
          
           $i=0;

         foreach($res['data'] as $row) {
        $z[$i]['photo']= '<img src="' . $row['images']['low_resolution']['url'] . '">';
        $z[$i]['description']=$row['caption']['text'];
        $z[$i]['link']=$row['link'];
        $z[$i]['likes']=$row['likes']['count'];
        $i++;

    }
}
 return $z;
   }
}
