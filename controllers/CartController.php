<?php

class CartController{


public function actionAdd($id){

$id_zakaznika =User::checkLogged(); 
if($id_zakaznika){
$id_kose = Cart::checkCart($id_zakaznika);
Cart::addProductDatabase($id,$id_kose);
}
else{
    Cart::addProduct($id);
}
$reference = $_SERVER['HTTP_REFERER'];
header("Location: $reference");

}

public function actionIndex(){
$categories = array();
$categories = Category::getCategoriesList();
	
$productsInCart = false;
$id_zakaznika =User::checkLogged(); 
if($id_zakaznika){
$id_kose = Cart::checkCart($id_zakaznika);    
$products = Cart::getProductsDatabase($id_kose);
$totalPrice = Cart::getTotalPriceDatabase($id_kose);
$countItems = Cart::countItemsDatabase($id_kose);
}
   else{
$productsInCart = Cart::getProducts();
if($productsInCart){
$productsIds = array_keys($productsInCart);
$products = Product::getProductsByIds($productsIds);
$totalPrice = Cart::getTotalPrice($products);
$countItems = Cart::countItems();
}
}
require_once(ROOT. '/views/cart/index.php');

}



public function actionCheckout(){
$result = false;
$jmeno = '';
$cislo = '';
$products = array();
$id_zakaznika = User::checkLogged();
if($id_zakaznika){
$id_kose = Cart::checkCart($id_zakaznika);    
$products = Cart::getProductsDatabase($id_kose);
$totalPrice = Cart::getTotalPriceDatabase($id_kose);
$totalQuantity = Cart::countItemsDatabase($id_kose);
}
else{


if(isset($_SESSION['products'])){
$productsInCart = Cart::getProducts();
$productsIds = array_keys($productsInCart);
$products = Product::getProductsByIds($productsIds);
$totalPrice = Cart::getTotalPrice($products);
$totalQuantity = Cart::countItems();

}
}

if(isset($_POST['submit'])){
$errors = '';
$adresa['kod'] = $_POST['kod'];
$adresa['mesto'] = $_POST['mesto'];
$adresa['psc'] = $_POST['psc'];
$adresa['ulice'] = $_POST['ulice'];
$email = $_POST['email'];
$adresa['id_zakaznika'] = isset($id_zakaznika)??null;
$idAdresy = Address::save($adresa);
$id_objednavky = Order::saveOrder($totalPrice,$adresa['id_zakaznika'],$idAdresy,$email);
$result = true;
foreach ($products as $product) {
    Order::addOrderProducts($id_objednavky,$product['id_produktu']);
}

if($id_zakaznika){
   Cart::clearCartDatabase(Cart::checkCart($id_zakaznika)); 
}
else{
     Cart::clearCart(); 
}


}



require_once(ROOT . '/views/cart/checkout.php');
return true;

}

public function actionDelete($id){

$id_zakaznika =User::checkLogged(); 
 $id;
if($id_zakaznika){
$id_kose = Cart::checkCart($id_zakaznika);
 Cart::deleteProductDatabase($id,$id_kose);
}
else{
Cart::deleteProduct($id);
}    

header("Location: /cart/");
}


}

