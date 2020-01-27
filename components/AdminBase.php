<?php


abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
if($userId){
   $roles = User::getUserRoles($userId);
        if(!empty($roles)){
         foreach ($roles as $role) {
         if($role['nazev']=="administrator"){
           return true;
         }
         }
    
        }
        die('Access denied');
    }
    else{
            header("Location: /user/login");
    }


}


     
}