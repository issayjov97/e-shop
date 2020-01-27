<?php

class UserController{

public function actionRegister()
{

$jmeno = '';
$prijmeni = '';
$cislo = '';
$email ='';
$heslo = '';
$result = false;
if(isset($_POST['submit'])){

$jmeno = $_POST['jmeno'];
$prijmeni =$_POST['prijmeni'];
$email = $_POST['email'];
$heslo = $_POST['heslo'];
$cislo =  $_POST['cislo'];

$errors = '';

   if (!User::checkEmail($email)) {
                $errors .= 'Email error <br/>';
            }            
            if (!User::checkPassword($heslo)) {
                 $errors .= 'Password must have 6 or more characters <br/>';
            }
              if (!User::checkJmeno($jmeno)) {
                 $errors .='Name error <br/>';
            }
            
              if (!User::checkPrijmeni($prijmeni)) {
                 $errors .= 'Prijmeni error  <br/>';
            }
            
              if (!User::checkTelefon($cislo)) {
                $errors .= 'Telefon error <br/>';
            }



            if(strlen($errors)>0){
              echo $errors;
            }
            else{
            	$id_zakaznika = User::register($jmeno, $prijmeni, $email, $cislo, $heslo);
                 User::addRole($id_zakaznika);
                 $result = true;

            }
}


	require_once(ROOT. '/views/user/register.php');
    return true;


}

    public function actionLogin()
    {

        $categories = array();
$categories = Category::getCategoriesList();

        $email = '';
        $heslo = '';
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $heslo = $_POST['heslo'];
            
            $errors = '';
                        
            if (!User::checkEmail($email)) {
                $errors .= 'Bad email</br>';
            }            
            if (!User::checkPassword($heslo)) {
                $errors .= 'Password must have  6 or more characters</br>';
            }
            
            $userId = User::checkUserData($email, $heslo);
            
            if ($userId == false) {
                $errors .= 'Wrong login or password</br>';


            } else {
                User::auth($userId);
                $kos =  Cart::checkCart($userId);
                if(!$kos){
                Cart::createCart($userId);  
                }
                
                header("Location: /cabinet/"); 
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }




    

    public function actionLogout()
    {
        unset($_SESSION["id_zakaznika"]);
        header("Location: /");
    }

}