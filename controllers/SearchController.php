<?php


class SearchController{


public function actionIndex($page = 1)
{
echo "index";
if(isset($_POST['submit'])){
if(isset($_POST['nazev'])){
$nazev = $_POST['nazev'];
$categoryProducts = Search::getProductsByNazev($nazev);
$total = count($categoryProducts);
$pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');
}
}
require_once(ROOT. "/views/site/search.php");

}

}