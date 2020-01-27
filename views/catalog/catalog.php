<?php include ROOT . '/views/layouts/header2.php'; ?>


	<main class="container">	
		<h1 class="title"><?= $categorie['nazev']?></h1>

		<ul class="breadcrumbs visually-hidden">
			<li class="breadcrumbs-current"><a href="">Главная</a></li>
			<li class="navigation-item">Моноподы для селфи</li>
		</ul>
		<div class="container-inner">	
		<h3> Filter:</h3>	

<div class="filters-column">
		<form action="#" class="filter" method="post">

			<fieldset>
				<legend>Maximalni cena</legend>
<div class="slidecontainer">
  <input type="range" min="1" max="1000000" value="1" class="slider" id="myRange1" name="maxCena" onclick="sliderAction()">
  <p>Cena: <span id="demo1"></span></p>
  <legend>Minimalni cena</legend>
   <input type="range" min="1" max="1000000" value="1" class="slider" id="myRange2" name="minCena" onclick="sliderAction()">
  <p>Cena: <span id="demo2"></span></p>
</div>
			</fieldset>
			<hr>
			



				 <?php foreach ($filtry as $key => $value):?>
			<fieldset>
				<legend><?= $key ?></legend>
				<ul>

						 <?php  foreach ($value as $key2 ):?>
					<li> 
						<input type="checkbox"  name="checkboxvar['<?= $key ?>']" value="<?= $key2['hodnota']?>">
						<label for=""><?= $key2['hodnota'];?></label>

					</li>
				<?php endforeach ?>

					<!-- <li>
						<input type="checkbox"  name="checkboxvar[]" value="Dell">
						<label for="">Dell</label>
					</li>
					<li>
						<input type="checkbox" name="checkboxvar[]" value="Apple">
						<label for="">Apple</label>
					</li>
						<li>
						<input type="checkbox" name="checkboxvar[]" value="Lenovo">
						<label for="">Lenovo</label>
					</li>
						<li>
						<input type="checkbox" name="checkboxvar[]" value="Asus">
						<label for="">Asus</label>
					</li>
						<li>
						<input type="checkbox" name="checkboxvar[]" value="HP">
						<label for="">HP</label>
					</li> -->
				</ul>
				
			</fieldset>
			<?php endforeach ?>
			<hr>
			<fieldset>
				<legend>Bluethoot</legend>
				<ul>
					<li>
						<input type="radio" name="bluetooth" value="1">
						<label for="">Yes</label>

					</li>
					<li>
						<input type="radio" name="bluetooth" value="0" checked>
						<label for="">No</label>
					</li>
				</ul>
			</fieldset>
			<input type="submit" name="submit"  value="Najit">
		</form>

		<ul class="catalog-list">
		<?php foreach ($categoryProducts as $product): ?>
						<li class="catalog-item">
				
					<a href="/product/<?= $product['id_produktu']?>">
						<img src="<?php echo Product::getImage($product['id_produktu']); ?>" width = "300" height= "300" alt="">
		
				<h3>	
					
				<span class="catalog-item-title"><?= $product['nazev']?></span>	
				
					<span class="catalog-item-price"><?= $product['cena']?> Kc</span>
				</h3>	
</a>
<div class="catalog-list-buttons">
        <a class="button" href="/cart/add/<?= $product['id_produktu']?>">Do kosiku</a>
         <a class="button" href="/product/compare/<?= $product['id_produktu']?>">Porovnat</a>
</div>

			</li>
		<?php endforeach; ?>

		</ul>
		</div>
	</div>
	<div> <?php echo $pagination->get(); ?>	</div>
		<!-- <ul class="pagination-list">
				<li class="pagination-item"><a href="/category/1/page-1"></a>1</li>
				<li class="pagination-item pagination-item-current"><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
			</ul> -->

	</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>