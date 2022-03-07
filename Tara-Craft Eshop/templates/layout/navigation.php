<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
?>

<nav class="site-header sticky-top py-4 bg-white">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
	<div>
		<h2><i><a href="http://localhost/eshopfinal/"><span>Tara</span><br> <span>Craft</span></i></a></h2>
	</div>
			
	<nav class="my-2 my-md-0 mr-md-3">
		<a class="p-2 text-dark" href="?page=aboutUs">E-shop</a> /  
		<a class="p-2 text-dark" href="?page=contact">Kontakt</a>
		<a class="btn btn-outline-primary" href="?page=cart">
			<i class="fas fa-shopping-cart"></i>
			<span class="badge"><?php echo $basket->getNumberOfItems(); ?></span><span>ks</span>
		</a>
	</nav>
			
  </div>
</nav>