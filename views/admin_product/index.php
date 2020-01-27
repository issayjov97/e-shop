<?php include ROOT . '/views/layouts/header2.php'; ?>
	
<div class="container">

<?php include ROOT . '/views/admin/admin-menu.php'; ?>	
	
<table class="admin-products">

 <a class = " button" href="/admin/products/create">Add product</a>
	
<tr>
	
	<th>Id_produktu</th>
	<th>Nazev</th>
	<th>Popisek</th>
	<th>Cena</th>
	<th>Dostupnost</th>
	<th>Vyrobce</th>
</tr>
<?php foreach ($products as $product) :?>
 <tr>
<td> <?=  $product['id_produktu']; ?></td>
<td> <?=  $product['nazev']; ?></td>
<td> <?=  $product['popisek']; ?></td>
<td> <?=  $product['cena']; ?></td>
<td  > <?=  $product['dostupnost']; ?></td>
<td> <?= Product::getVyrobceProduktuById($product['id_vyrobce']); ?></td>
<td><a href="/admin/products/update/<?= $product['id_produktu']?>">Edit</a></td>
<td><a href="/admin/products/delete/<?= $product['id_produktu']?>">Delete</a></td>
 </tr>

<?php endforeach;?>

</table>
	<div> <?php echo $pagination->get(); ?>	</div>
	</div>	

<?php include ROOT . '/views/layouts/footer.php'; ?>