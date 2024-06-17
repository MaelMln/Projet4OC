<?php

require 'header.php';
require 'config.php';

try {
	$stmt = $mysqlClient->query('SELECT * FROM oeuvres');
	$oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
	die('Erreur lors de la récupération des oeuvres : ' . $e->getMessage());
}
?>

<div id="liste-oeuvres">
	<?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
	<?php endforeach; ?>
</div>

<?php require 'footer.php'; ?>
