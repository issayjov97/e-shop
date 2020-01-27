<?php include ROOT . '/views/layouts/header2.php'; ?>
    

<section>
    <div class="container">

<?php include ROOT . '/views/admin/admin-menu.php'; ?>


            <h4>Добавить category</h4>


     <!--        <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
 -->
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Nazev</p>
                        <input type="text" name="nazev" placeholder="" value="">

                        <p>Podkategorie </p>
                        <input type="number" name="podkategorie" placeholder="" value="">

                        <p>Status</p>
                        <select name="dostupnost">
                            <option value="1" selected="selected">Zablokovat</option>
                            <option value="0">Odblokovat</option>
                        </select>
                                <br/>
                        <input type="submit" name="submit"  value="Ulozit">

                    </form>
                </div>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

