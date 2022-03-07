<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
	
	if(!isset($_POST["id"])){
		die('Problem with query!');
	}
	
	$basket->removeProduct($_POST["id"]);
?>