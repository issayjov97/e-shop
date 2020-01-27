<?php include ROOT . '/views/layouts/header2.php'; ?>
    

<section>
    <div class="container">

<?php include ROOT . '/views/admin/admin-menu.php'; ?>  


            <h4>Добавить новый товар</h4>


     <!--        <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
 -->
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Nazev produktu</p>
                        <input type="text" name="nazev" placeholder="" value="">

                        <p>Cena, Kc</p>
                        <input type="number" name="cena" placeholder="" value="">

                        <p>Kategorie</p>
                        <select name="id_kategorie">
                            <?php if (is_array( $categories)): ?>
                                <?php foreach ( $categories as $category): ?>
                                    <option value="<?php echo $category['id_kategorie']; ?>">
                                        <?php echo $category['nazev']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                        <p>Vyrobce</p>
                        <input type="number" name="vyrobce" placeholder="" value="">

                        <p>Obrazek produktu</p>
                        <input type="file" name="obrazek" placeholder="" value="">

                        <p>Popisek</p>
                        <textarea name="popisek"></textarea>


                        <p>Dostupnost</p>
                        <select name="dostupnost">
                            <option value="1" selected="selected">Ano</option>
                            <option value="0">Ne</option>
                        </select>


                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>


                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>


                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                       </br>
                        <input type="submit" name="submit" class="btn btn-default" value="Ulozit">


                    </form>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

