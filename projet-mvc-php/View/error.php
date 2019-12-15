<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Une erreur est survenue</h1>
        </div>
    </div>

    <h3>Erreur :</h3>
    <code><?= $error ?></code>

    <hr>

    <ul class="list-group">
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>