<?php 


class Address{


public static function save($address){

$db = Db::getConnection();


$result = $db->prepare("INSERT INTO `adresy`(`mesto`, `ulice`,  `id_uzivatele`, `stat`, `psc`) VALUES (:mesto,:ulice,:id_uzivatele,:stat,:psc)");

        $result->bindParam(':mesto', $address['mesto'], PDO::PARAM_STR);
        $result->bindParam(':ulice', $address['ulice'] , PDO::PARAM_STR);
        $result->bindParam(':id_uzivatele', $address['id_zakaznika'], PDO::PARAM_STR);
        $result->bindParam(':stat', $address['kod'] , PDO::PARAM_STR);
        $result->bindParam(':psc',  $address['psc'], PDO::PARAM_STR);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       if($result->execute()){
       	return $db->lastInsertId();
       }
       else{
       	return false;
       }

}


}