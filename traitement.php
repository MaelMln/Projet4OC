<?php
require 'config.php';

function escape($data)
{
	return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

if (empty($_POST['titre']) ||
	(empty($_POST['description']) || strlen($_POST['description']) < 3) ||
	empty($_POST['artiste']) ||
	(empty($_POST['image']) || !filter_var($_POST['image'], FILTER_VALIDATE_URL))) {
	header('Location: ajouter.php');
} else {
	$title = escape($_POST['titre']);
	$description = escape($_POST['description']);
	$artist = escape($_POST['artiste']);
	$image = escape($_POST['image']);

	try {
		$stmt = $mysqlClient->prepare("INSERT INTO oeuvres (title, description, artist, image) VALUES (?, ?, ?, ?)");
		$stmt->execute([$title, $description, $artist, $image]);

		header('Location: oeuvre.php?id=' . $mysqlClient->lastInsertId());
	} catch (Exception $e) {
		echo 'Erreur lors de l\'insertion : ' . $e->getMessage();
	}
}
?>
