<?php
session_start(); 

require_once $urlPrefix .'Services/ProductService.php';
require_once $urlPrefix . 'Entities/Basket.php';
require_once $urlPrefix . 'Entities/User.php';
require_once $urlPrefix . 'Services/EmailService.php';

$productService = new ProductService($urlPrefix . 'products.xml');
$basket = new Basket;
$user = new User(
			"Anton Šutiak", "nieco@nieco.sk", "+421 915 111 222", "Kvačálová 14", "02201", "Čadca", "Slovenská republika", 
			"ITmarketing", "44844956", "SK1061057945", ""
		);
$emailService = new EmailService($user, $basket, $productService, $urlPrefix);
echo $emailService->send();

if (!empty($_POST)) {
	$productId = $_POST['productId'];
	$quantity = $_POST['quantity'];
	
	$basket->addProduct($productId, $quantity);
	header("Location: ./");
	return;
}

echo "<br>";

$products = $productService->getAllProducts();

foreach ($products as $product) {
  echo
  "<form method=\"post\">
      <label>". $product->getTitle() . " | " . $product->getPrice() ." EUR </label>
      <input type=\"text\" name=\"quantity\">
      <input type=\"hidden\" name=\"productId\" value=\"" . $product->getId() . "\">
      <input type=\"submit\" value=\"Kúpiť\">
  </form>";
}

echo "<br>";
echo "<strong><u>Nákupný košík</u></strong>";
echo "<br>";
echo "Počet položiek: " . $basket->getNumberOfItems();
echo "<br>";
echo "Celková cena: " . $productService->getTotalPrice($basket->getProductIdsWithQuantity());