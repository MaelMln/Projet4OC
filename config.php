<?php
try {
	$mysqlClient = new PDO('mysql:host=localhost;dbname=oeuvres;charset=utf8', 'root', '123456789');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
?>
