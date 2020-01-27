<?php

class Product
{

    const SHOW_BY_DEFAULT = 6;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($page = 1,$countPr = self::SHOW_BY_DEFAULT)
    {
         $page = intval($page);
          $count= intval($countPr);
         $productsList = array();
             $offset = ($page - 1)* $count;
            $db = Db::getConnection();            
            $products = array();
            $stmnt = $db->prepare('SELECT * FROM produkty '
               . ' ORDER BY id_produktu DESC'                
               . ' LIMIT '. $count
               . ' OFFSET ' . $offset);
            $stmnt->execute();

        $i = 0;
        while ($row = $stmnt->fetch()) {
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
    
    /**
     * Returns an array of products
     */
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            $page = intval($page);
             $offset = ($page - 1)*self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();            
            $products = array();
            $stmnt = $db->prepare('SELECT pr.* FROM produkty pr'  
               . ' INNER JOIN produkty_kategorie pk USING(id_produktu)'  
               . ' WHERE pk.id_kategorie = ?'
               . ' ORDER BY pr.id_produktu DESC'                
               . ' LIMIT '. self::SHOW_BY_DEFAULT
               . ' OFFSET ' . $offset);
            $stmnt->bindParam(1,$categoryId);
            $stmnt->execute();
            $i = 0;
            while ($row = $stmnt->fetch()) {
            $products[$i]['id_produktu'] = $row['id_produktu'];
            $products[$i]['nazev'] = $row['nazev'];
            $products[$i]['popisek'] = $row['popisek'];
            $products[$i]['cena'] = $row['cena'];
            $products[$i]['dostupnost'] = $row['dostupnost'];
            $products[$i]['id_vyrobce'] = $row['id_vyrobce'];
                $i++;
            }

            return $products;       
        }
    }
    
       public static function getFilteredProducts($categoryId = false, $page = 1,$filterBrands,$minCena,
        $maxCena)
      { 
         $mnCena = intval($minCena);
         $mxCena = intval($maxCena);
         $products = array();
            $page = intval($page);
             $offset = ($page - 1)*self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();            
            $products = array();
            $sql = "SELECT produkty.* FROM atributy" 
. " INNER JOIN produkty on atributy.id_produktu = produkty.id_produktu"
. " INNER JOIN hodnoty on atributy.id_hodnoty = hodnoty.id_hodnoty"
. " INNER JOIN typicke_atributy_produktu on atributy.id_typ_atribut = typicke_atributy_produktu.id"
. " INNER JOIN produkty_kategorie on produkty_kategorie.id_produktu = produkty.id_produktu "
. " WHERE produkty_kategorie.id_kategorie = '$categoryId' AND produkty.cena BETWEEN $mnCena AND $mxCena";
         foreach ($filterBrands as $key => $value) {
            $sql .=" AND typicke_atributy_produktu.nazev LIKE $key AND hodnoty.hodnota LIKE '$value'";
         
         }
        
           $stmnt = $db->prepare($sql);
           // $i = 2;
           // echo "</br>";
           // foreach ($filterBrands as $key => $value) {
           //     $key = '%'.$key.'%';
           //       $stmnt->bindParam(':key',$key);
                
           // }
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
              $stmnt->execute();
            $i = 0;
            while ($row = $stmnt->fetch()) {
            $products[$i]['id_produktu'] = $row['id_produktu'];
            $products[$i]['nazev'] = $row['nazev'];
            $products[$i]['popisek'] = $row['popisek'];
            $products[$i]['cena'] = $row['cena'];
            $products[$i]['dostupnost'] = $row['dostupnost'];
            $products[$i]['id_vyrobce'] = $row['id_vyrobce'];

                $i++;
            }
                  
        
return $products; 
    }

    
    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM produkty WHERE id_produktu =' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }


     public static function getProductsByIds($idsArray)
    {
      $products = array();
            $db = Db::getConnection();
            $idsString = implode(',', $idsArray);
            $result = $db->query("SELECT * FROM produkty WHERE id_produktu IN ($idsString)");
            $result->setFetchMode(PDO::FETCH_ASSOC);
         
            $i = 0;
            while ($row = $result->fetch()) {

            $products[$i]['id_produktu'] = $row['id_produktu'];
            $products[$i]['nazev'] = $row['nazev'];
            $products[$i]['popisek'] = $row['popisek'];
            $products[$i]['cena'] = $row['cena'];
            $products[$i]['dostupnost'] = $row['dostupnost'];
            $products[$i]['id_vyrobce'] = $row['id_vyrobce'];
                $i++;
                
            }
            return $products;
        
    }
    
    
    /**
     * Returns an array of recommended products
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM produkty '
            . 'WHERE status = "1" AND is_recommended = "1"'
            . 'ORDER BY id DESC ');

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }


public static function addProduktToCompare($id, $idCategory){


    if(isset($_COOKIE['compare_products'])){
   
    $serialized = $_COOKIE['compare_products'];
    $products = unserialize($serialized);
    $products[$id] = $idCategory;
    setcookie('compare_products',serialize($products),time()+3600,'/');

    }
    else{
        $products = array();
        $products[$id] = $idCategory;
       setcookie('compare_products',serialize($products),time()+3600,'/');

    }
return true;

}


    public static function deleteProductById($id){
       $db = Db::getConnection();
        $sql = "DELETE FROM produkty WHERE id_produktu = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id);
        return $result->execute();
    }

    public static function createProduct($product){
        $db = Db::getConnection();

$sql = 'INSERT INTO produkty (nazev, popisek, cena, dostupnost, id_vyrobce, id_kategorie) VALUES '
. '(:nazev,:popisek,:cena,:dostupnost,:id_vyrobce)';

$result = $db->prepare($sql);
$result->bindParam(':nazev',$product['nazev']);
$result->bindParam(':popisek',$product['popisek'],PDO::PARAM_STR);
$result->bindParam(':cena',$product['cena']);
$result->bindParam(':dostupnost',$product['dostupnost'],PDO::PARAM_INT);
$result->bindParam(':id_vyrobce',$product['vyrobce'],PDO::PARAM_INT);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
if($result->execute()){
 
return $db->lastInsertId();
    }
    return false;
}



    public static function updateProduct($product){
        $db = Db::getConnection();

$db->beginTransaction();
$sql = 'UPDATE produkty as pr SET pr.nazev= :nazev,pr.popisek=:popisek,pr.cena=:cena, pr.dostupnost=:dostupnost,'
. ' pr.id_vyrobce = :id_vyrobce'
. ' WHERE  pr.id_produktu = :id';

$result = $db->prepare($sql);
$result->bindParam(':id',$product['id_produktu']);
$result->bindParam(':nazev',$product['nazev']);
$result->bindParam(':popisek',$product['popisek'],PDO::PARAM_STR);
$result->bindParam(':cena',$product['cena']);
$result->bindParam(':dostupnost',$product['dostupnost'],PDO::PARAM_INT);
$result->bindParam(':id_vyrobce',$product['vyrobce'],PDO::PARAM_INT);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

if($result->execute()){
    $sql = 'UPDATE `obrazky_produkty` SET `obrazek`=:nazev_obrazku WHERE id_produktu = :id';

$result = $db->prepare($sql);
$result->bindParam(':id',$product['id_produktu']);
$result->bindParam(':nazev_obrazku',$product['nazev_obrazku'],PDO::PARAM_INT);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
if($result->execute()){
    $db->commit();
    return true;
}

}
$db->rollBack();
return false;
}


public static function getImage($id){

$default =  "default.jpg";
$path = "/productImages/";

   $db = Db::getConnection();
   
   $sql = "SELECT id_produktu, obrazek FROM `obrazky_produkty`  WHERE id_produktu = :id_produktu";

   $result = $db->prepare($sql);
   $result->bindParam(":id_produktu",$id);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
 if(!empty($row)){
     $pathToImage = $path . $row['obrazek'];
if(file_exists($_SERVER['DOCUMENT_ROOT']. $pathToImage))
{
return $pathToImage;
}

 }
 $pathToImage =$path . $default;
return $pathToImage;
}

public static function addImage($obrazek,$id_produktu){

   $db = Db::getConnection();
   
   $sql = "INSERT INTO `obrazky_produkty`( `obrazek`, `id_produktu`) VALUES (:id_obrazku,:id_produktu)";

   $result = $db->prepare($sql);
   $result->bindParam(":id_obrazku",$obrazek);
   $result->bindParam(":id_produktu",$id_produktu);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   return $result->execute();
}

public static function getComparedProducts(){

        if(isset($_COOKIE['compare_products'])){
          
    $serialized = $_COOKIE['compare_products'];
    $products = unserialize($serialized);
        
        return $products;
        }   
        return false;
    }


    public static function getTotalProductsInCategory($id)
    {
 $db = Db::getConnection();
 $sql = 'SELECT COUNT(*) as count FROM PRODUKTY'
 . ' INNER JOIN produkty_kategorie pk USING(id_produktu)'  
 . ' WHERE pk.id_kategorie = :id';
 $stmnt = $db->prepare($sql);
 $stmnt-> bindParam(":id",$id); 
 $stmnt->execute();
 $result = $stmnt->fetch();
 return $result['count'];

    }



    public static function getTotalProducts()
    {
 $db = Db::getConnection();
 $sql = 'SELECT COUNT(*) as count FROM PRODUKTY';
 $stmnt = $db->prepare($sql);
 $stmnt->execute();
 $result = $stmnt->fetch();
 return $result['count'];

    }


      public static function getVyrobceProduktu()
    {
 $db = Db::getConnection();
 $sql = 'SELECT * FROM vyrobce ';
 $stmnt = $db->prepare($sql);
 $stmnt->bindParam(':id',$id);
 $stmnt->execute();
 $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
 return $result;

    }


          public static function getVyrobceProduktuById($id)
    {
 $db = Db::getConnection();
 $sql = 'SELECT nazev FROM vyrobce WHERE id_vyrobce = :id';
 $stmnt = $db->prepare($sql);
 $stmnt->bindParam(':id',$id);
 $stmnt->execute();
 $result = $stmnt->fetch(PDO::FETCH_ASSOC);
 return $result['nazev'];

    }



     public static function getAtributyProduktu($id)
    {
 $db = Db::getConnection();
 $sql = 'SELECT atributy.id_atributu, tp.nazev, hodnoty.hodnota,tp.id  FROM atributy' 
. ' inner JOIN typicke_atributy_produktu as tp ON tp.id =atributy.id_typ_atribut'
. ' INNER JOIN hodnoty USING(id_hodnoty)'
. ' where atributy.id_produktu = :id';
 $stmnt = $db->prepare($sql);
 $stmnt->bindParam(':id',$id);
 $stmnt->execute();
 $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
 return $result;

    }



        public static function getHodnotyAtributu($id,$hodnota)
    {
 $db = Db::getConnection();
 $sql = 'SELECT tp.nazev,hodnoty.hodnota FROM hodnoty' 
. ' inner JOIN typicke_atributy_produktu as tp on hodnoty.id_typ_atributu = tp.id'
. ' WHERE hodnoty.id_typ_atributu = :id AND hodnoty.hodnota <> :hodnota ORDER BY TP.nazev;';
 $stmnt = $db->prepare($sql);
 $stmnt->bindParam(':id',$id);
 $stmnt->bindParam(':hodnota',$hodnota);
 $stmnt->execute();
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
 return $result;

    }










}