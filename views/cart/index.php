<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">

                <div class="features_items">
                    <h2 class="title text-center">Kos</h2>
                     <?php if(!empty($products)):  ?>
                        <p>Vybrane produkty:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Id produktu</th>
                                <th>Nazev</th>
                                <th>Cena</th>
                                <th>Pocet</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['id_produktu'];?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id_produktu'];?>">
                                            <?php echo $product['nazev'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['cena'];?></td>
                                    <td><?php echo $productsInCart[$product['id_produktu']];?></td>   
                                    <td> 
                                     <a href="/cart/delete/<?php echo $product['id_produktu'];?>">Delete</a>
                                      </td>                     
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="3">Celkem:</td>
                                    <td><?php echo $totalPrice;?></td>
                                </tr>
                        </table>
                       </br>
                    <a href="/cart/checkout">Objednat</a>
             
                </div>
                <?php else: ?>
                  <p>Prazdny kos</p>
                  <?php endif; ?>   
    </div>
</br>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>