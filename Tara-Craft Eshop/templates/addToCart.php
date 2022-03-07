<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
	
	if(!isset($_POST["quantity"]) || !isset($_POST["id"])){
		die('Problem with query!');
	}
		
	$basket->addProduct($_POST["id"], $_POST["quantity"]);
?>