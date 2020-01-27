<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class CatalogController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        // $latestProducts = array();
        // $latestProducts = Product::getLatestProducts(12);

        require_once(ROOT . '/views/catalog/catalog.php');

        return true;
    }
    
    public function actionCategory($categoryId, $page =1)
    {

     $minCena = 1;
     $maxCena = 1000000;
     $result = false;
        $filtry =Category::getFiltryCategorie($categoryId);
        $vybraneFiltry = array();

        if(isset($_POST['submit'])){
           
           if(isset($_POST['checkboxvar'])){
            $result = true;
             $vybraneFiltry = $_POST['checkboxvar'];
       }
        }
            
        $categories = array();
        $categories = Category::getCategoriesList();

        $categorie = Category::getCategoryById($categoryId); 
        
        $categoryProducts = array();
         if ($result) {
      $categoryProducts = Product::getFilteredProducts($categoryId,$page,$vybraneFiltry,$minCena,$maxCena);
        }
        else{
         $categoryProducts = Product::getProductsListByCategory($categoryId,$page);

        }
       
        $total  = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');
       
        require_once(ROOT . '/views/catalog/catalog.php');

        return true;
    }

}
