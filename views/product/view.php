<?php include ROOT . '/views/layouts/header2.php'; ?> 

    <main class="container">

        <h1 class="page-title"><?= $product['nazev']?></h1>

        <ul class="breadcrumbs">
            <li>
                <a href="index.html">Главная</a>
            </li>
            <li>
                <a href="#">Магазин</a>
            </li>
            <li>
                <a href="#">Средства для ухода</a>
            </li>
            <li class="breadcrumbs-current">Набор для путешествий «Baxter of California»</li>
        </ul>

<div class="catalog-columns">   
        <section class="product-photos">
            <h2 class="visually-hidden">Obrazek produktu</h2>
            <p class="product-photo-full">
                <img src="<?php echo Product::getImage($product['id_produktu']); ?>" width="300" height="300" alt="">
            </p>
        
        </section>

        <section class="product-details">
            <h2 class="visually-hidden">Popisek</h2>
            <p class="product-availability">Dostupnost: <?php echo($product['dostupnost']==1? 'Skladem':'Neni');  ?></p>
            <p class="product-text"><?= $product['popisek']?></p>
            <p class="product-price">
                <b><?= $product['cena']?> Kc</b>
            </p>
                <a class="button" href="/cart/add/<?= $product['id_produktu']?>">Do kosiku</a>
                  <a class="button" href="/product/compare/<?= $product['id_produktu']?>">Porovnat</a>
            
        </section>
         </div>
    </main>

 <?php include ROOT . '/views/layouts/footer.php'; ?> 
