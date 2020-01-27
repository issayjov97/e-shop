<?php

class Search{

    public static function getProductsByNazev($nazev)
    {
        $db = Db::getConnection();

        $products = array();

        $result = $db->prepare("SELECT * FROM produkty"
            . " WHERE produkty.nazev LIKE ? ");
        $nazev = '%'.$nazev.'%';
         $result->bindParam(1,$nazev);
        $result->execute();
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


  public static function getProductsCount($nazev)
    {
        $db = Db::getConnection();

        $products = array();

        $result = $db->prepare("SELECT COUNT(*) FROM produkty"
                 . " INNER JOIN PRODUKTY_KATEGORIE USING(id_produktu) "
            . " WHERE produkty.nazev LIKE ? ");
        $nazev = '%'.$nazev.'%';
         $result->bindParam(1,$nazev);
        $result->execute();
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


}

