<?php
require_once (ROOT.'/components/Db.php');

class Category
{

    /**
     * Returns an array of categories
     */
    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT * FROM kategorie');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id_kategorie'] = $row['id_kategorie'];
            $categoryList[$i]['nazev'] = $row['nazev'];
             $categoryList[$i]['id_podkategorie'] = $row['id_podkategorie'];
             $categoryList[$i]['status'] = $row['status'];
            $i++;
        }

        return $categoryList;
    }


     public static function getCategorieNazev($categoryId)
    {

        $db = Db::getConnection();


        $result = $db->prepare('SELECT  nazev FROM kategorie WHERE id_kategorie = ? ');
        $result->execute(array($categoryId));

        $row = $result->fetch();
         $categoryNazev = $row['nazev'];
           


        return  $categoryNazev;
    }

         public static function getTotalProductsInCategory($categoryId)
    {

        $db = Db::getConnection();


        $result = $db->prepare('SELECT  count(*) AS count FROM produkty_kategorie WHERE id_kategorie = ? ');
        $result->execute(array($categoryId));

        $row = $result->fetch();
         $totalProducts = $row['count'];
           


        return $totalProducts;
    }

        public static function getCategoryById($id)
    {
        $id = intval($id);
            $db = Db::getConnection();
            $stmt = $db->prepare('SELECT * FROM kategorie WHERE id_kategorie = :id');
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $categorie; 
    }


      public static function deleteCategoryById($id){
       $db = Db::getConnection();
        $sql = "DELETE FROM KATEGORIE WHERE id_kategorie = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id);
        return $result->execute();
    }



         public static function getProductCategory($categoryId)
    {

        $db = Db::getConnection();


        $result = $db->prepare('SELECT id_kategorie  FROM produkty_kategorie WHERE id_produktu = ? ');
        $result->execute(array($categoryId));

        $row = $result->fetch();
        $id_kategorie = $row['id_kategorie'];
           


        return $id_kategorie;
    }


             public static function getFiltryCategorie($categoryId)
    {

        $db = Db::getConnection();
        $filters = array(); 
        $result = $db->prepare('SELECT typicke_atributy_produktu.nazev, hodnoty.hodnota FROM' 
       . ' typicke_atributy_produktu' 
       . ' INNER JOIN hodnoty on hodnoty.id_typ_atributu = typicke_atributy_produktu.id'
       . ' where  typicke_atributy_produktu.id_kategorie = :id ORDER BY typicke_atributy_produktu.nazev');
        $result->bindParam(':id',$categoryId);
        $result->execute();
        $i = 0;
        // while ($row = $result->fetchA(PDO::FETCH_UNIQUE)) {
        //  $filters[$i]['nazev'] = $row['nazev'];
        //  $filters[$i]['hodnota'] = $row['hodnota'];
        //  $i++;
        // }
        return $result->fetchAll(PDO::FETCH_GROUP);
    }



    public static function createCategory($category){
        $db = Db::getConnection();

$sql = 'INSERT INTO kategorie (nazev, id_podkategorie, status ) VALUES '
. '(:nazev, :id_podkategorie, :status)';
$id_podkategorie =  $category['podkategorie']==0?null:$category['podkategorie'];
$result = $db->prepare($sql);
$result->bindParam(':nazev',$category['nazev']);
$result->bindParam(':id_podkategorie',$id_podkategorie,PDO::PARAM_INT);
$result->bindParam(':status',$category['dostupnost'],PDO::PARAM_INT);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
if($result->execute()){
 
return $db->lastInsertId();
    }
 print_r($db->errorInfo());
    return 0;

}
}