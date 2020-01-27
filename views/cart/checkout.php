<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">
          

                <div class="features_items">
                    <h2 class="title text-center">Kos</h2>


                   <?php if ($result): ?>

                        <p>Objednavka se vyrizuje. Dekujeme</p>
                    </br>

                    <?php else: ?>

                      <h4>Vybrano produktu: <?php echo $totalQuantity; ?>, castka: <?php echo $totalPrice; ?>, Kc.</h4>

                            <?php if (isset($errors)): ?>
                                <p> <?php echo $errors;?></p>
                            <?php endif; ?>

                            <h3>Pro dokonceni objednavky vyplnte formular . Budeme vas v nejblizsi dobe kontaktovat.</h3>

                            <div class="login-form">
                                <form action="#" method="post">

                                     <p>Email</p>
                                    <input type="text" name="email" placeholder="" value=""/>
                                    <p>Kod statu</p>
                                    <input type="text" name="kod" placeholder="" value=""/>

                                    <p>Mesto</p>
                                    <input type="text" name="mesto" placeholder="" value=""/>

                                    <p>Ulice</p>
                                    <input type="text" name="ulice" placeholder="" value=""/>

                                    <p>Psc</p>
                                    <input type="text" name="psc" placeholder="" value=""/>
                                       </br>

                                    <input type="submit" name="submit" class="btn btn-default" value="Objednat" />
                                </form>
                            </div>

<?php endif; ?>
                </div>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>