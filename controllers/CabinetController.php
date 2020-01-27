<?php


class CabinetController{

  public function actionIndex()
    {

    	$userId = User::checkLogged();
      if($userId){
    	$zakaznik = User:: getUserById($userId);
        require_once(ROOT . '/views/cabinet/index.php');
}
else{
   header("Location: /user/login");
}

        return true;
    }




 public function actionEdit(){

$id = $_SESSION['id_zakaznika'];
$result = false;
$errors = '';
if(isset($id)){

 $zakaznik = User::getUserById($id);   

}

if(isset($_POST['submit'])){

$jmeno = $_POST['jmeno'];
$prijmeni =$_POST['prijmeni'];
$email = $_POST['email'];
$cislo =  $_POST['cislo'];


   if (!User::checkEmail($email)) {
                $errors .= 'Email error <br/>';
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



            if(strlen($errors)==0){
              $result = true;
               User::updateUser($id,$jmeno,$prijmeni,$cislo,$email);
            }
              
}
require_once(ROOT . '/views/cabinet/edit.php');
return true;

}

public function actionHistory(){
    $id = $_SESSION['id_zakaznika'];
  $orders = User::getUserOrders($id);
  require_once(ROOT . '/views/cabinet/history.php');
  return true;
}


public function actionShow($id){
  AdminBase::checkAdmin();

  $order = Order::getOrderById($id);
  $products = Order::getOrderProducrs($id);

  require_once(ROOT . '/views/cabinet/view.php');
  return true;

}
}