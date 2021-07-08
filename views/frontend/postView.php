<?php 
// $title varie en fonction du post sélectionné
$title = htmlspecialchars($post['title']);
ob_start(); // "mémorise" toute la sortie HTML qui suit
?>

<div class="container-fluid">

    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="container mt-4">
        <div class="container-fluid py-4">
            <div class="card">
                <h5 class="card-header"><?= htmlspecialchars($post['title']) ?><em> le <?= $post['creation_date_fr'] ?></em></h5>
                <div class="card-body">
                    <p class="card-text"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                </div>
            </div>
        </div>
    </div>

    <h2>Commentaires</h2>

    <hr>
    <h5 class="text-center mt-4">Ajouter un commentaire</h5>
    <div class="container w-50 mt-4">
        <!-- ajoute le commentaire avec l'id du post-->
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author" class="form-label">Auteur</label><br>
                <input type="text" id="author" name="author" class="form-control" mb-3>
            </div>
            <div>
                <label for="comment" class="form-label">Commentaire</label><br>
                <textarea id="comment" name="comment" class="form-control mb-3" rows="5"></textarea>
            </div>
            <div>
                <input type="submit" class="btn btn-primary mb-3">
            </div>
        </form>
    </div>


    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?=  $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    }
    ?>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?> 
