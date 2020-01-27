<?php


class AdminProductsController{


public function actionIndex($page = 1){
AdminBase::checkAdmin();
echo $page;
$products = array();
$products = Product::getLatestProducts($page,12);
print_r($products);
$total = Product::getTotalProducts();

 $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

require_once(ROOT . '/views/admin_product/index.php');
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


echo "actionDelete";
Product::deleteProductById($id);
header("Location: /admin/products");


return true;	

}

public function actionCreate(){
AdminBase::checkAdmin();


   $categories = array();
   $categories = Category::getCategoriesList();

   if(isset($_POST['submit']))
{
            $options['nazev'] = $_POST['nazev'];
            $options['cena'] = $_POST['cena'];
            $options['id_kategorie'] = $_POST['id_kategorie'];
            $options['vyrobce'] = $_POST['vyrobce'];
            $options['dostupnost'] = $_POST['dostupnost'];
            $options['popisek'] = $_POST['popisek'];
 $id = Product::createProduct($options);
 echo $id;

if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
{
move_uploaded_file($_FILES['obrazek']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. "/productImages/{$id}.jpg");
}
// header("Location: /admin/products");
}


require_once(ROOT . '/views/admin_product/create.php');

return true;	

}

public function actionUpdate($id){
AdminBase::checkAdmin();
echo "Update";
$product = Product::getProductById($id);
$vyrobce = Product::getVyrobceProduktu();
$categories = Category::getCategoriesList();
$atributy = Product::getAtributyProduktu($id);
$hodnotyAtributu = array();
foreach ($atributy as  $atribut) {
$hodnotyAtributu = Product::getHodnotyAtributu($atribut['id'],$atribut['hodnota']);
}

$options = array();
$noveAtributy = array();

if(isset($_POST['submit'])){
	$options['id_produktu'] = $id;

if(isset($_POST['nazev'])){
   
    $options['nazev'] = $_POST['nazev'];
}
if(isset($_POST['cena'])){

 $options['cena'] = $_POST['cena'];

}
if(isset($_POST['vyrobce'])){

 $options['vyrobce'] = $_POST['vyrobce'];

}
if(isset($_POST['obrazek'])){

}
if(isset($_POST['popisek'])){

$options['popisek'] = 	$_POST['popisek'];

}
if(isset($_POST['dostupnost'])){

$options['dostupnost'] =  $_POST['dostupnost'];

}

if(isset($_POST['kategorie'])){

$options['kategorie'] =  $_POST['kategorie'];
}


if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
{
  $nazev_obrazku = $_FILES['obrazek']['name'];
  $options['nazev_obrazku'] = $nazev_obrazku;
  echo $nazev_obrazku;
	move_uploaded_file($_FILES['obrazek']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. "/productImages/$nazev_obrazku");
}


foreach ($atributy as $value) {
  if(isset($_POST[$value['nazev']])){
 $noveAtributy[$value['nazev']] = $value['hodnota'];

  }
}

 if(Product::updateProduct($options)){

header("Location: /admin/product");

}


}
Product::getImage($id);
require_once(ROOT . '/views/admin_product/update.php');

return true;	

}




}