<?php 


class Order{


public static function saveOrder($castka,$id_zakaznika,$id_adresa,$email){

$db = Db::getConnection();


$result = $db->prepare("INSERT INTO `objednavky`(`casove_razitko`, `castka`, `status_objednavky`, `id_adresa`, `id_zakaznika`, `email`) VALUES (:casove_razitko,:castka, :status_objednavky, :id_adresa, :id_zakaznika, :email)");

 $result->bindValue(':casove_razitko', date('Y-m-d H:i:s'));
        $result->bindParam(':castka', $castka, PDO::PARAM_STR);
        $result->bindValue(':status_objednavky',1);
        $result->bindParam(':id_adresa', $id_adresa);
        $result->bindParam(':id_zakaznika', $id_zakaznika);
         $result->bindParam(':email', $email);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        if ($result->execute()){
            return $db->lastInsertId();
        }
        return false;
    }










public static function getAllOrders(){

$db = Db::getConnection();
$sql = 'SELECT * FROM objednavky';
$orders = array();

$result = $db->query($sql);
$i = 0;

while($row = $result->fetch()){
	echo $i;
	$orders[$i]['id_objednavky'] = $row['id_objednavky'];
	$orders[$i]['cas'] = $row['casove_razitko'];
	$orders[$i]['castka'] = $row['castka'];
	$orders[$i]['adresat'] = $row['adresat'];
	$orders[$i]['status_objednavky'] = $row['status_objednavky'];
	$orders[$i]['id_adresa'] = $row['id_adresa'];
	$orders[$i]['id_zakaznika'] = $row['id_zakaznika'];	
$i++;
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
return $orders;
}



public static function removeOrder($id){
$db = Db::getConnection();
$sql = 'DELETE FROM objednavky WHERE id_objednavky = :id';
$result = $db->prepare($sql);
$result->bindParam(":id",$id);
return $result->execute();
}


    public static function getOrderById($id)
    {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM objednavky WHERE id_objednavky =' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }

    public static function getOrderProducrs($id){
        $db = Db::getConnection();
        $productsList = array();
        $result = $db->prepare('SELECT * FROM produkty '
      . 'INNER JOIN  objednavky_produkty USING(id_produktu) '
      . 'WHERE objednavky_produkty.id_objednavky = :id');
        $result->bindParam(":id",$id);
         $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id_produktu'] = $row['id_produktu'];
            $productsList[$i]['nazev'] = $row['nazev'];
            $productsList[$i]['popisek'] = $row['popisek'];
            $productsList[$i]['cena'] = $row['cena'];
            $productsList[$i]['dostupnost'] = $row['dostupnost'];
             $productsList[$i]['id_vyrobce'] = $row['id_vyrobce'];
            $i++;
        }

        return $productsList;
    }

        public static function addOrderProducts($id_objednavky,$id_produktu){
            echo "Add produkty";
            echo "</br>";
            $id_objednavky = intval($id_objednavky);
            $id_produktu = intval($id_produktu);
            echo $id_objednavky;
             echo "</br>";
            echo $id_produktu;
        $db = Db::getConnection();
        $result = $db->prepare('INSERT INTO `objednavky_produkty`(`id_objednavky`, `id_produktu`) VALUES (:id_objednavky,:id_produktu)');
        $result->bindParam(":id_objednavky",$id_objednavky);
        $result->bindParam(":id_produktu",$id_produktu);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
        return $result->execute();


        }


}