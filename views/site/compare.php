<?php include ROOT . '/views/layouts/header2.php'; ?>
	
<div class="container">

<h2>Compare</h2>
<?php if(!empty($products)): ?>
<table class="admin-products">

<!--  <a class = "button" href="/admin/products/create">Add product</a>
	 -->

<tr>
	
	<th>Id_produktu</th>
	<th>Nazev</th>
	<th>Popisek</th>
	<th>Cena</th>
	<th>Dostupnost</th>
	<th>Vyrobce</th>
	<th>Obrazek</th>
</tr>
<?php foreach ($products as $product) :?>
 <tr>
<td> <?=  $product['id_produktu']; ?></td>
<td> <?=  $product['nazev']; ?></td>
<td> <?=  $product['popisek']; ?></td>
<td> <?=  $product['cena']; ?></td>
<td> <?=  $product['dostupnost']; ?></td>
<td>  <?= Product::getVyrobceProduktuById($product['id_vyrobce']); ?></td>
<td><img src="<?php echo Product::getImage($product['id_produktu']); ?>" width="80" height="80" alt=""></td>
 <td><a class="fa fa-close" href="/compare/delete/<?=  $product['id_produktu']; ?>">
	Delete
</a></td>
 </tr>


<?php endforeach;?>
</table>
<?php else: ?>
<h4> Ntohing to compare </h4>


<?php endif;?>
	</div>	


<?php include ROOT . '/views/layouts/footer.php'; ?>