<?php
	session_start();
	
	$urlPrefix = 'app/';
	require_once $urlPrefix . 'Services/ProductService.php';
	require_once $urlPrefix . 'Entities/Basket.php';
	
	$safeFile = true;
  
	$page = "";
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	
	$activeCategory = null;
	if(isset($_GET["category"])){
		$activeCategory = $_GET["category"];
	}
	
	$productService = new ProductService($urlPrefix.'products.xml');
	$basket = new Basket;
	
	if(isset($_POST["action"])){
		$action = $_POST["action"];
		switch($action){
			case "addToCart":
				require_once 'templates/addToCart.php';
				break;
			case "removeFromCart":
				require_once 'templates/removeFromCart.php';
				break;
			case "processOrder":
				require_once 'templates/processOrder.php';
				break;
		}
		
		if(isset($_POST["redirect"])){
			header("Location:".$_POST["redirect"]);
			return;		
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/myStyles.css">
		
    <title>Eshop - TaraCraft</title>
  </head>
  <body>
	
	<!-- NAVIGATION -->
	<?php require_once("templates/layout/navigation.php"); ?>
	
    <div class="py-5 bg-light">        
		<div class="container">
			<div class="row">
				<!-- LEFT MENU / CATEGORIES -->
				<?php require_once("templates/layout/leftMenu.php"); ?>
			
				<!-- RIGHT / PRODUCTS -->
				<?php 
					switch($page){
						case "aboutUs":
							require_once("templates/staticPages/aboutUs.php");
							break;
						case "services":
							require_once("templates/staticPages/services.php");
							break;
						case "contact":
							require_once("templates/staticPages/contact.php");
							break;
						case "cart":
							require_once("templates/cart.php");
							break;
						case "orderCompleted":
							require_once("templates/orderCompleted.php");
							break;
						default:
							require_once("templates/products.php");
							break;		
					}								
				?>
				
			</div>
		</div>
	</div>
		
	<!-- FOOTER -->
	<?php require_once("templates/layout/footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		
  </body>
</html>