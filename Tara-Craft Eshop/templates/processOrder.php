<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
	
	if($_POST["firstName"] == "" || $_POST["lastName"] == "" || $_POST["email"] == "" || $_POST["phone"] == "" ||
	   $_POST["street"] == "" || $_POST["psc"] == "" || $_POST["city"] == "" || $_POST["country"] == "" || $basket->getNumberOfItems() == 0
		){
		die('Problem with data!');
	}
	
	require_once $urlPrefix.'/Entities/User.php';
	require_once $urlPrefix.'/Services/EmailService.php';
	
	$user = new User(
		$_POST['firstName'] . " " . $_POST['lastName'], $_POST['email'], $_POST['phone'], 
		$_POST['street'], $_POST['psc'], $_POST['city'], $_POST['country'],
		$_POST['company'], $_POST['ico'], $_POST['dic'], $_POST['icDph']
	);
	
	$emailService = new EmailService($user, $basket, $productService, $urlPrefix);
	$emailService->send();
	
	$basket->emptyBasket();
?>