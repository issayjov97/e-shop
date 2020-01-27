<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        // $latestProducts = array();
        // $latestProducts = Product::getLatestProducts(6);
        
        require_once(ROOT . '/views/site/index.php');

        return true;
    }



     public function actionContact()
    {
      $categories = array();
        $categories = Category::getCategoriesList();

if(isset($_POST['submit'])){
$to = 'st55409@student.upce.cz';
$subject = 'Hello from XAMPP!';
$message = $_POST['userText']; ;
$headers = $_POST['userEmail'];;
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";


      }
    }
     


        require_once(ROOT . '/views/site/contact.php');

        return true;
    }

     public function actionCompare()
    {
      $categories = array();
      $categories = Category::getCategoriesList();

      $products = Product::getComparedProducts();
      if($products){
      $idProducts = array_keys($products); 
      $products = Product:: getProductsByIds($idProducts);
      echo (sizeof($products));
      }
    
    

       require_once(ROOT . '/views/site/compare.php');

        return true;
    }

     public function actionDelete($id)
    {
                $idPr = intval($id);
        $products = Product::getComparedProducts();
        foreach ($products as $key => $value) {
           if($idPr == $key){
            unset($products[$key]);
           }
        }
     setcookie('compare_products',serialize($products),time()+3600,'/');
 header("Location: admin/compare");

        return true;
    }





}
