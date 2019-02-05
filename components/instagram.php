<?php

class instagram {
   public static function Last5PhotosFromInst(){
        $z=array();
        $client_id    = '90280c55724b4bf585436a76629a389c';
        $access_token = '10751514447.90280c5.e289cea61f89461f876e40db87893148';
        $user_id      = '10751514447'; // Цифры идущие до первой точки в ACCESS_TOKEN

        $res = file_get_contents('https://api.instagram.com/v1/users/' . $user_id 
                . '/media/recent/?client_id=' . $client_id 
                . '&access_token=' . $access_token 
                . '&count=5');

        $res = json_decode($res, true);
        if (!empty($res['data'])) {
          
           $i=0;

         foreach($res['data'] as $row) {
        $z[$i]['photo']= '<img src="' . $row['images']['standard_resolution']['url'] . '">';
        $z[$i]['description']=$row['caption']['text'];
        $z[$i]['link']=$row['link'];
        $z[$i]['likes']=$row['likes']['count'];
        $i++;

    }
}
 return $z;
   }
}
