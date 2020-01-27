<?php include ROOT . '/views/layouts/header2.php'; ?>


<section>
    <div class="container">
<?php include ROOT . '/views/admin/admin-menu.php'; ?>

            <h4>Редактировать category #<?php echo $id; ?></h4>

                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="nazev" placeholder="" value=" <?= $category['nazev'] ?>">

                   
                        <p>Podkategorie </p>
                        <input type="number" name="podkategorie" placeholder="" value=" ">

                        <p>Status</p>
                        <select name="dostupnost">
                            <option value=" <?= $category['status'] ?>" selected="selected">Zablokovat</option>
                            <option value="0">Odblokovat</option>
                        </select>
                                <br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                

       
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>