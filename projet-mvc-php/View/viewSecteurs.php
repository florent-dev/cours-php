<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gestion des secteurs</h1>
        </div>
    </div>

    <h2>Liste des secteurs</h2>
    <?php foreach ($secteurs as $secteur) { ?>
        <a href='index.php?action=viewSecteur&id=<?= $secteur->getId() ?>'><button type="button" class="btn btn-sm btn-dark mt-2"><?= $secteur->getLibelle(); ?></button></a>
    <?php } ?>

    <p class="mt-4">
        <a href='index.php?action=editorSecteur'><button type="button" class="btn btn-info">Ajouter un secteur</button></a>
    </p>

    <hr>

    <ul class="list-group">
        <a href='index.php?action=viewStructures'><li class="list-group-item">Liste des structures</li></a>
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>