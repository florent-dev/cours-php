<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><?= (($structure->getEstAssocie()) ? 'Association' : 'Société') ?> <?= $structure->getNom() ?></h1>
        </div>
    </div>
    
    <div>Id : <?= $structure->getId() ?></div>
    <div>Nom : <?= $structure->getNom() ?></div>
    <div>Rue : <?= $structure->getRue() ?></div>
    <div>CP : <?= $structure->GetCp() ?></div>
    <div>Ville : <?= $structure->getVille() ?></div>
    <div>Type : <?= (($structure->getEstAssocie()) ? 'Association' : 'Société') ?></div>
    <div>Nombre de donateurs : <?= $structure->getNbDonateurs() ?></div>
    <div>Nombre de d'actionnaires : <?= $structure->getNbActionnaires() ?></div>

    <hr>

    <ul class="list-group">
        <a href='index.php?action=viewStructures'><li class="list-group-item">Retour sur la liste des structures</li></a>
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>