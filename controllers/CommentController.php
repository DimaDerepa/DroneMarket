<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentController
 *
 * @author mc_Dimas
 */
class CommentController {
   public function actionDelete ($id) {
          
        $db = Db::getConnection();
        $query="DELETE FROM comments WHERE id=:id";
           
        $result=$db->prepare($query);
        $result->bindValue(':id', $prod);

        $result->execute();
         return  TRUE;
    }
}
