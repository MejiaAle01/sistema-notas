<?php
	try {
		$cn = new PDO("mysql:host=localhost;dbname=bdescuela","escuela","escuela");
	} catch (PDOException $ex) {
		print_r("Error: ". $ex->getMessage());
		//die($ex->getMessage());
		die();
	}
?>