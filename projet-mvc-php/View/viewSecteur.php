<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><?= $title ?> n°<?= $secteur->getId() ?></h1>
        </div>
    </div>

    <div>Id : <?= $secteur->getId() ?></div>
    <div>Nom : <?= $secteur->getLibelle() ?></div>

    <hr>

    <ul class="list-group">
        <a href='index.php?action=viewSecteurs'><li class="list-group-item">Retour sur la liste des secteurs</li></a>
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>