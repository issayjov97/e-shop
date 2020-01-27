<?php
class Cart{


	public static function addProduct($id){

		$id = intval($id);
         $id_kose = intval($id_kose);
		$productsInCart = array();
		if(isset($_SESSION['products'])){
			$productsInCart =$_SESSION['products'];
		}
		if(array_key_exists($id,$productsInCart)){
			$productsInCart[$id]++;

		}
		else{
			$productsInCart[$id] = 1;	
		}

		$_SESSION['products'] = $productsInCart;
		return true;
	}


public static function addProductDatabase($id,$id_kose){
	$id = intval($id);
    $id_kose = intval($id_kose);
    $db = Db::getConnection();
$sql = 'INSERT INTO `kose_produkty`(`id_kose`, `id_produktu`) VALUES (?,?)';
$result = $db->prepare($sql);
$result->bindParam(1,$id_kose);
$result->bindParam(2,$id);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
return $result->execute();
}

public static function countItems(){

	if(isset($_SESSION['products'])){
		$count = 0;
		foreach ($_SESSION['products'] as $id => $quantity) {
			$count = $count + $quantity;
			}
			return $count;
		}	
		return 0;
	}


public static function countItemsDatabase($id_kose){

$db = Db::getConnection();
$sql = "SELECT COUNT(*) as count FROM KOSE_PRODUKTY WHERE id_kose = :id_kose";
$result = $db->prepare($sql);
$result->bindParam(':id_kose',$id_kose);
$result->execute();
$result = $result->fetch();
return $result['count'] ;

	}


	public static function getProducts(){

		if(isset($_SESSION['products'])){
		
		return $_SESSION['products'];
		}	
		return false;
	}

		public static function getProductsDatabase($id_kose){
	$db = Db::getConnection();
	$sql = "SELECT produkty.* FROM `kose_produkty`"
. " INNER JOIN produkty USING(id_produktu)"
. " WHERE kose_produkty.id_kose = :id_kose";
$result = $db->prepare($sql);
$result->bindParam(':id_kose',$id_kose);
$result->execute();	
return $result->fetchAll();
 
	}


	public static function getTotalPrice($products){

	$productsInCart = self::getProducts();
	$total = 0;
	if($productsInCart){
	foreach($products as $item) {
	$total += $item['cena']*$productsInCart[$item['id_produktu']];
	}
	}
	return $total;

	}


	public static function getTotalPriceDatabase($id_kose){

	$db = Db::getConnection();
	$sql = "SELECT SUM(produkty.cena) as price FROM `kose_produkty`"
. " INNER JOIN produkty USING(id_produktu)"
. " WHERE kose_produkty.id_kose = :id_kose";
$result = $db->prepare($sql);
$result->bindParam(':id_kose',$id_kose);
$result->execute();	
$price = $result->fetch();
return $price['price'];
	}


public static function clearCart(){

	if(isset($_SESSION['products'])){
		unset($_SESSION['products']);
	}
}



public static function clearCartDatabase($id_kose){
	$db = Db::getConnection();
	$sql = "DELETE FROM `kose_produkty` WHERE id_kose =:id_kose ";
$result = $db->prepare($sql);
$result->bindParam(':id_kose',$id_kose);
return $result->execute();	;
}


public static function deleteProduct($id){

$products = self::getProducts();
unset($products[$id]);
$_SESSION['products'] = $products;
return true;

}

public static function deleteProductDatabase($id,$id_kose){
    $db = Db::getConnection();
  
$sql = "DELETE FROM KOSE_PRODUKTY WHERE id_produktu = :id and id_kose = :id_kose";

$result = $db->prepare($sql);
$result->bindParam(':id',$id);
$result->bindParam(':id_kose',$id_kose);
return $result->execute();



}


public static function createCart($id){

$db = Db::getConnection();
$date = new DateTime();
$date->format('Y-m-d H:i:s');
$sql = "INSERT INTO `kose`(`pocet`, `casove_razitko`, `id_zakaznika`) VALUES (?,?,?)";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,0);
$stmt->bindValue(2,$date->getTimestamp());
$stmt->bindParam(3,$id);
return $stmt->execute();
}

public static function checkCart($id){

$db = Db::getConnection();

$sql = "SELECT id_kose as kos FROM KOSE WHERE ID_ZAKAZNIKA = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$result = $stmt->fetch();
return $result['kos'];
}
}
