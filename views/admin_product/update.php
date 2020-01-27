<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">

<?php include ROOT . '/views/admin/admin-menu.php'; ?>  

            <h4>Editace produktu #<?php echo $id; ?></h4>

                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Nazev</p>
                        <input type="text" name="nazev" placeholder="" value="<?php echo $product['nazev']; ?>">

                     <!--    <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>"> -->

                        <p>Cena, Kc</p>
                        <input type="text" name="cena" placeholder="" value="<?php echo $product['cena']; ?>">

                       <!--  <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                         -->

                        <p>Vyrobce</p>
                        <select name="vyrobce" id="">
                            <?php foreach ($vyrobce as $value): ?>

                            <option value="<?= $value['id_vyrobce']?>"  <?php if($value['id_vyrobce']==$product['id_vyrobce']) echo 'selected';  ?>>
                                <?php echo $value['nazev']; ?>
                            </option>
                        <?php endforeach; ?>

                        </select>
                     

                      <p>Kategorie</p>
                        <select name="kategorie">
                            <?php foreach ($categories as $category): ?>

                                <?php if($product['id_kategorie'] == $category['id_kategorie']): ?>
                            <option value="<?= $category['id_kategorie'] ?>" selected ><?= $category['nazev'] ?></option>

                            <?php  else:?>
                            <option value="<?= $category['id_kategorie'] ?>" ><?= $category['nazev'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </select>



                        <p>Obrazek produktu</p>
                         <img src="<?php echo(Product::getImage($product['id_produktu'])); ?>"  width = "200" alt="" />

                     </br>
                        <input type="file" name="obrazek" placeholder="" value="<?php echo $product['image']; ?>">
                       


                        <p>Popis</p>
                        <textarea name="popisek"><?php echo $product['popisek']; ?></textarea>
                        
                

                        <p>Dostupnost</p>
                        <select name="dostupnost">
                            <option value="1" >Ano</option>
                            <option value="0" >Ne</option>
                        </select>
                            <?php if(sizeof($atributy > 0 )): ?>
                                <?php foreach ($atributy as $atribut):?>
                            <p><?= $atribut['nazev'] ?></p>
                            <select name="<?= $atribut['nazev'] ?>">
                                <option value="<?= $atribut['hodnota'] ?>"><?= $atribut['hodnota'] ?></option>
                                <?php foreach ($hodnotyAtributu as $value):?>
                                    <?php if($atribut['nazev'] == $value['nazev']): ?>
                                    <option value="$value['hodnota']"><?= $value['hodnota'] ?></option>  
                                     <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>
                        <?php endforeach; ?>
                            <?php endif; ?>
                             </br>
                        <input type="submit" name="submit"  value="Ulozit">
                        
                    </form>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>