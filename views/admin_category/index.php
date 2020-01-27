<?php include ROOT . '/views/layouts/header2.php'; ?>

	
<div class="container">

<?php include ROOT . '/views/admin/admin-menu.php'; ?>

<table class="admin-products">

 <a class = "button" href="/admin/categories/create">Add categorie</a>
	
<tr>
	
	<th>Id categorie</th>
	<th>Nazev</th>
	<th>Dostupnost</th>
	<th>Podkategorie</th>
</tr>
<?php foreach ($categories as $categorie) :?>
 <tr>
<td> <?=  $categorie['id_kategorie']; ?></td>
<td> <?=  $categorie['nazev']; ?></td>
<td> <?=  $categorie['status']; ?></td>
<td> <?=  $categorie['id_podkategorie']; ?></td>
<td><a href="/admin/categories/update/<?= $categorie['id_kategorie']?>">Edit</a></td>
<td><a href="/admin/categories/delete/<?= $categorie['id_kategorie']?>">Delete</a></td>
 </tr>

<?php endforeach;?>

</table>
	</div>	

<?php include ROOT . '/views/layouts/footer.php'; ?>