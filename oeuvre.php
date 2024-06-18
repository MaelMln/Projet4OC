<?php
    require 'header.php';
    require 'config.php';

    if(empty($_GET['id'])) {
        header('Location: index.php');
    }

    $stmt = $mysqlClient->prepare("SELECT * FROM oeuvres WHERE id = ?");
    $stmt->execute(array($_GET['id']));
    $oeuvre = $stmt->fetch();


    if(is_null($oeuvre) || empty($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
