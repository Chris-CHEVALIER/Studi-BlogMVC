<?php
$title = 'ajout-post';
ob_start(); // "mémorise" toute la sortie HTML qui suit
?>

<div class="container w-50 mt-4">
        <!-- ajoute le commentaire avec l'id du post-->
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="author" class="form-label">Auteur</label><br>
                <input type="text" id="author" name="author" class="form-control mb-3">
            </div>
            <div>
                <label for="title" class="form-label">titre</label><br>
                <input id="title" name="title" class="form-control mb-3">
            </div>
            <div>
                <label for="comment" class="form-label">article</label><br>
                <textarea id="comment" name="comment" class="form-control mb-3" rows="5"></textarea>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Ajouter une image</label>
              <input class="form-control" type="file" id="formFile">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mb-3">
            </div>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>