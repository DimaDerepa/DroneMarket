<?php
$saved='instagram.json';
$client_id    = '0bcd33bc863f45d996872581ef0bd087';
$access_token = '10751514447.0bcd33b.1cf66cfffbb24bbd94216cc5127cb9f8';
$user_id      = '10751514447'; // Цифры идущие до первой точки в ACCESS_TOKEN
$res = file_get_contents('https://api.instagram.com/v1/users/' . $user_id 
                . '/media/recent/?client_id=' . $client_id 
                . '&access_token=' . $access_token 
                . '&count=5');
if(strlen($res)>=200){
$fp=fopen($saved, 'w');
fwrite($fp, $res);
fclose($fp);}else{}
