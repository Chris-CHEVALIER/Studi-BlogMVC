<?php 
$title = 'Mon blog'; // $title sera inséré dans la balise <title> du <head>
ob_start(); // "mémorise" toute la sortie HTML qui suit
?>

<div class="container mt-4">
    <p>Derniers billets du blog :</p>

    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="container-fluid py-4">
            <div class="card">
                <h5 class="card-header"><?= htmlspecialchars($data['title']) ?><em> le <?= $data['creation_date_fr'] ?></em></h5>
                <div class="card-body">
                    <p class="card-text"><?= nl2br(htmlspecialchars($data['content'])) ?></p>
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"   class="btn btn-primary">Commentaires</a>
                </div>
            </div>
        </div>
    <?php
    }
    $posts->closeCursor();
    ?>
</div>

<?php $content = ob_get_clean(); // On met le tout dans content du template?>
<?php require('views/frontend/template.php'); ?>
