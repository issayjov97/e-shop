	<?php include ROOT . '/views/layouts/header2.php'; ?>

	<main class="main">
		<div class="container">
	<section class="slideshow-container">

		<div class="mySlides fade">
			
	 <div class="slider-left">
		<img src="../../template/images/slider-1.png" alt="" >
	 </div>
	<div class="slider-right">

	<h2 class="item-title" >
	Делай селфи,<br>
	как Бен Стиллер!	
	</h2>

	<p class="main-product-text">
	Самая длинная палка для селфи доступна в нашем магазине.
	Восемь (Восемь, Карл!) метров длиной и весом всего 5 килограмм.	
	</p>
	<a href="">Подробнее</a>
	<div class="product-info">
	<p class="product-height">
		8,5 м<br>
		Длина палки
		
	</p>
	<p class="product-weight">
		5 кг<br>
		Вес палки
	</p>

	<p class="product-type">
		Карбон<br>
		Материал
	</p>
	</div>
	</div>	
	</div>
		<div class="mySlides fade">
			
	 <div class="slider-left">
		<img src="" alt="">
	 </div>
	<div class="slider-right">

	<h2>
	Делай EEEE,<br>
	как Бен Стиллер!	
	</h2>
	<p class="main-product-text">
	Самая длинная палка для селфи доступна в нашем магазине.
	Восемь (Восемь, Карл!) метров длиной и весом всего 5 килограмм.	
	</p>
	<a href="">Подробнее</a>
	<p class="product-height">
		8,5 м<br>
		Длина палки
		
	</p>
	<p class="product-weight">
		5 кг<br>
		Вес палки
	</p>

	<p class="product-type">
		Карбон<br>
		Материал
	</p>
	</div>	
	</div>



	<div class="dots" style="text-align:center">
	  <span class="dot" onclick="currentSlide(1)"></span>
	  <span class="dot" onclick="currentSlide(2)"></span>
	  <span class="dot" onclick="currentSlide(3)"></span>
	</div>

	</div>
	</section>
		

	<div class="container">
	<section class="product-types">
	 
	 <?php foreach  ($categories as $category):?>
	 		<div class="product-type">
	<div class="product-type image">
	<a href="/category/<?= $category['id'] ?>>">
	<img src="" alt=""></div>
	<p><?= $category['nazev']?></p>
	</a>    

	</div>	
	 

<?php endforeach; ?>



	</section>
	</div>
	<section class="deliver">
		<div class="container">
			<div class="deliver-inner">
		<div class="deliver-left">
			<ul class="deliver-list">
		
		<li>Доставка</li>
		<li>Гарантия</li>
		<li>Кредит</li>	
	</ul>	
		</div>
	<div class="deliver-center">
		
	<h1 class="deliver-title">Доставка</h1>
	<p class="deliver-text">
	Мы с удовольствием доставим ваш товар прямо к вашему подъезду совершенно бесплатно! Ведь мы неплохо заработаем, поднимая его на ваш этаж.
	</p>
	</div>
	<div class="deliver-right">

	</div>

		

	</div>
	</div>
	</section>
	<section class="companies">
		<div class="container">
			<div class="companies-inner">
			<div class="logo">
				<img src="../../template/images/logo-1.jpg" alt="">	

			</div>
			<div class="logo">
				<img src="../../template/images/logo-2.jpg" alt="">	

			</div>
				<div class="logo">
				<img src="../../template/images/logo-3.jpg" alt="">	

			</div>

		<div class="logo">
				<img src="../../template/images/logo-4.jpg" alt="">	

			</div>

	</div>
	</div>
	</section>
	<div class="index-columns">
		<div class="container">	
			<div class="index-inner">	
	<section class="about">
		<h1>About us</h1>
		<p>
			Огромный выбор гаджетов не оставит равнодушным гика, который есть в каждом из нас.

	Мы можем доставить ваш товар в самые отдаленные точки России! DEVICE работает со многими транспортными компаниями:

		</p>
	<ul>
		<li>Деловые Линии</li>
		<li>Автотрейдинг</li>
		<li>ЖелДорЭкспедиция</li>
	</ul>

	<a href="">Подробнее о нас</a>

	</section>
	<section class="contacts">
			<h1>Контакты</h1>
		<p>
			Вы можете забрать товар сами, заехав в наш офис. Заодно, вы сможете проверить работоспособность покупки. Всякое бывает.

		</p>
	<div class="contacts-map">
		<img src="../../template/images/map.jpg" alt="">
	</div>
	<a href="" class="inn">Напишите нам</a>
	</section>
	</div>
	</div>
	</div>
	</main>


	<?php include ROOT . '/views/layouts/footer.php'; ?>