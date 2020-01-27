<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/template/style/style.css">
	<link rel="stylesheet" href="/template/style/deviceProductStyle.css">
	<link rel="stylesheet" href="/template/style/fonts.css">
	<link rel="stylesheet" href="/template/style/normalize.css">
	<link rel="stylesheet" href="/template/style/media.css">
	<title>Device</title>
</head>
<body>
	
	<header class="main-header">
		<div class="container">
			<div class="main-header-inner">
				<h1 class="main-header-title">
	     <a href="/">
			DEVICE		
				</a>
			</h1>	
	
<div class="header-btn-menu"  onclick="showMenu()">
		<span class="icon-menu"> </span>
	</div>				

                <div class="header-top" id="myLinks">


                     <form action="/search" method="post">
                     <input type="text" name="nazev">	
                      <input type="submit" name="submit" value="Najit">
                     </form>
					<!-- <a class="search">Поиск</a> -->
					<?php if(User::isGuest()):?>
					<a href="/user/login/" class="header-login" onclick="openForm()">Prihlasit</a>
					<?php else: ?>
					<a href="/user/logout/" class="header-logout" >Out</a>
					<a href="/cabinet/" class="header-kabinet" >Kabinet</a>
				<?php endif; ?>
					<a href="/cart/" class="header-bucket">
					Kos
<span class="cart-count"></span>
				</a>
					
					<a href="/compare/" class="header-compare">Porovnat</a>
				</div>

				<div class="header-main">
					<nav>

		<ul class="menu-navigace">
		<li class="menu-item">
		
<div class="dropdown">
  <button class="dropbtn">Kategorie</button>
  <div class="dropdown-content">
   
<?php foreach  ($categories as $category):?>
	 	<a href="/category/<?= $category['id_kategorie']?>"><?= $category['nazev']?></a>
<?php endforeach; ?>

  </div>
</div>


	</li>
		<ul class="menu-navigace2">
		<li class="menu-item"><a href="">Doruceni</a></li>
		<li class="menu-item"><a href="">Zaruka</a></li>
		</ul>
		
		<li class="menu-item"><a href="/contact">Kontakty</a></li>
	</ul>	


					</nav>	

				</div>


			</div>
		</div>
	</header>	
