<?php 

	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','dbmahasiswa');
	$options = [
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_CASE => PDO::CASE_NATURAL,
	    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
	];
	try {
		$con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS,$options);
	} catch (PDOException $e) {
		exit("Error " .$e->getMessage());
	}

?>