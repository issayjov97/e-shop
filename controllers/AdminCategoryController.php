<?php 


class AdminCategoryController{


public function actionIndex(){
	AdminBase::checkAdmin();


$categories = array();
$categories = Category::getCategoriesList();
require_once(ROOT . '/views/admin_category/index.php');
return true;	

}


// public function actionUpdate($id){

// $products = array();
// $products = Product::getLatestProducts();

// require_once(ROOT . '/views/admin_product/index.php');
// return true;	

// }


public function actionDelete($id){
	AdminBase::checkAdmin();


Category::deleteCategoryById($id);
header("Location: /admin/categories");


return true;	

}

public function actionCreate(){
	AdminBase::checkAdmin();


   $categories = array();
   $categories = Category::getCategoriesList();

   if(isset($_POST['submit']))
{
            $options['nazev'] = $_POST['nazev'];
            $options['podkategorie'] = $_POST['podkategorie'];
            $options['dostupnost'] = $_POST['dostupnost'];
 $id = Category::createCategory($options);
 if($id){
header("Location: /admin/categories");
 }

}


require_once(ROOT . '/views/admin_category/create.php');

return true;	

}

public function actionUpdate($id){
	AdminBase::checkAdmin();


$category = Category::getCategoryById($id);
require_once(ROOT . '/views/admin_category/update.php');

return true;	

}





}
