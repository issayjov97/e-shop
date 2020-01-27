	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/template/style/style.css">
		<link rel="stylesheet" href="/template/style/fonts.css">
	<link rel="stylesheet" href="./style/normalize.css">
	<title>Device</title>
</head>
<body>

<header class="main-header">
<div class="container">
	<div class="main-header-inner">
<h1 class="main-header-title">DEVICE</h1>	

<div class="header-top">
	<span class="search">Поиск по сайту</span>
	<a href="/user/login/" class="header-login" >Войти</a>
	<a href="" class="header-bucket">Корзина</a>
	<a href="/compare/" class="header-compare">Сравнить</a>
</div>

<div class="header-main">
<nav>

<ul class="menu-navigace">
		<li class="menu-item">
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
 <div id="myDropdown" class="dropdown-content">
	 <?php foreach  ($categories as $category):?>
 
	 	<a href="/category/<?= $category['id_kategorie']?>"><?= $category['nazev']?></a>


<?php endforeach; ?>

	</div>	


  </div>
</li>
		<ul class="menu-navigace2">
		<li class="menu-item"><a href="">Доставка</a></li>
		<li class="menu-item"><a href="">Гарантия</a></li>
		</ul>
		
		<li class="menu-item"><a href="/contact/">Контакты</a></li>
	</ul>	

	</nav>
	<hr class="header-line">	
</div>
	</div>


</div>
</div>
</header>