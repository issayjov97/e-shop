<?php include ROOT . '/views/layouts/header2.php'; ?>
	
<div class="container">


<table class="admin-orders">

<tr>
	
	<th>Id_order</th>
	<th>Castka</th>
	<th>Status objednavky</th>
	<th>Adresa</th>
	<th>Zakaznik</th>
</tr>
<?php if(!empty($orders)) : ?>
<?php foreach ($orders as $order) :?>
 <tr>
 <td> <?=  $order['id_objednavky']; ?></td>
<td> <?=  $order['castka']; ?></td>
<td> <?=  $order['status_objednavky']; ?></td>
<td> <?=  $order['id_adresa']; ?></td>
<td> <?=  $order['id_zakaznika']; ?></td>

<td><a href="/cabinet/history/orders/show/<?= $order['id_objednavky']?>">Show</a></td>
 </tr>

<?php endforeach;?>
<?php endif; ?>

</table>
	</div>	

<?php include ROOT . '/views/layouts/footer.php'; ?>