<?php include ROOT . '/views/layouts/header2.php'; ?>


<section>
    <div class="container">



            <h3>Objednavka #<?php echo $order['id_objednavky']; ?></h3>


            <h4>Informace o objednavce</h4>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Cislo objednavky</td>
                    <td><?php echo $order['id_objednavky'];  ?></td>
                </tr>
                <tr>
                    <td>Castka</td>
                    <td><?php echo  $order['castka'];  ?></td>
                </tr>   
                <tr>
                    <td>Adresa</td>
                    <td><?php echo $order['id_adresa']; ?></td>
                </tr>
                <?php if ($order['id_zakaznika'] != 0): ?>
                    <tr>
                        <td>Id uzivatele</td>
                        <td><?php echo $order['id_zakaznika']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Status</b></td>
                    <td><?php echo $order['status_objednavky']; ?></td>
                </tr>
                <tr>
                    <td><b>Datum objednani</b></td>
                    <td><?php echo $order['casove_razitko']; ?></td>
                </tr>
            </table>

            <h4>Produkty objednavky</h4>

        <table class="admin-products">

<tr>
	
	<th>Nazev</th>
	<th>Popisek</th>
	<th>Cena</th>
	<th>Vyrobce</th>
</tr>
<?php foreach ($products as $product) :?>
 <tr>
<td> <?=  $product['nazev']; ?></td>
<td> <?=  $product['popisek']; ?></td>
<td> <?=  $product['cena']; ?></td>
<td> <?= Product::getVyrobceProduktuById($product['id_vyrobce']); ?></td>
 </tr>

<?php endforeach;?>

</table>



</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>