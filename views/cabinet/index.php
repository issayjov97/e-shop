<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">

            <h1>Vitame vas na nasem webu</h1>
            
            <h3>Cau, <?php echo $zakaznik['jmeno']; ?></h3>
            <ul class="edit-menu">
                <li><a class="button" href="/cabinet/edit">Zmenit Udaje</a></li>
                <li><a class="button" href="/cabinet/history">Nakupni list</a></li>
            </ul>
            
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>