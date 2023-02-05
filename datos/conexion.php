<?php
	try {
		$cn = new PDO("mysql:host=xxxxxxx;dbname=xxxxxxxx","xxxxxxx","xxxxxxxx");
	} catch (PDOException $ex) {
		print_r("Error: ". $ex->getMessage());
		//die($ex->getMessage());
		die();
	}
?>
