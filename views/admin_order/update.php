<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">
<?php include ROOT . '/views/admin/admin-menu.php'; ?>  

            <h4>Редактировать order #<?php echo $id; ?></h4>

                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Order id</p>
                        <input type="text" name="id_objednavky" placeholder="" value="<?php echo $order['id_objednavky']; ?>">

                        <p>Order time</p>
                        <input type="text" name="cas" placeholder="" value="<?php echo $order['casove_razitko']; ?>"> 

                        <p>Price, $</p>
                        <input type="text" name="cena" placeholder="" value="<?php echo $order['castka']; ?>">

                        <p>Adresat</p>
                        <input type="text" name="adresat" placeholder="" value="<?php echo $order['adresat']; ?>">

                        <p>Status</p>
                        <input type="number" name="status" placeholder="" value="<?php echo  $order['status_objednavky']; ?>">

                        <p>Adresa</p>
                        <input type="text" name="adresa" placeholder="" value="<?php echo  $order['id_adresa']; ?>">

                        <p>Zakaznik</p>
                        <input type="text" name="zakaznik" placeholder="" value="<?php echo $order['id_zakaznika']; ?>">
                        <br/>

                        <input type="submit" name="submit"  value="Сохранить">
                        
                    </form>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>