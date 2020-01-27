<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">
        <div class="row">

                <?php if ($result): ?>
                    <h2>Zmena osobnich udaju probehla v poradku</h2>
                    <?php header( "refresh:2;url=/cabinet" ); ?>
                <?php else: ?>
                    <?php if (isset($errors)): ?>
                     <p><?php echo $errors; ?> </p>
                    <?php endif; ?>

          <div class="signup-form"><!--sign up form-->
                        <h2>Zmena osobnich udaju</h2>
                        <form  action="#" method="post">
                            <input type="text" name="jmeno" placeholder="Имя" value="<?= $zakaznik['jmeno'] ?>"/>
                            <input type="text" name="prijmeni" placeholder="Фамилия" value="<?=$zakaznik['prijmeni']  ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?=$zakaznik['email']  ?>"/>
                             <input type="tel" name="cislo" placeholder="Telefon" value="<?= $zakaznik['cislo']?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="Zmenit" />
                        </form>
                    </div>
                
                <?php endif; ?>
        </div>
    </div>
</section>
</br>

<?php include ROOT . '/views/layouts/footer.php'; ?>