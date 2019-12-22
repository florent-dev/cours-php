<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Association <?= $association->getNom() ?></h1>
            </div>
        </div>

        <div>Id : <?= $association->getId() ?></div>
        <div>Nom : <?= $association->getNom() ?></div>
        <div>Rue : <?= $association->getRue() ?></div>
        <div>CP : <?= $association->getCp() ?></div>
        <div>Ville : <?= $association->getVille() ?></div>
        <div>Nombre de donateurs : <?= $association->getNbdonateurs() ?></div>

        <a href='index.php?action=editorAssociation&id=<?= $association->getId() ?>'><button type="button" class="btn btn-sm btn-info">Modifier</button></a>
        <a href='index.php?action=deleteStructure&id=<?= $association->getId() ?>'><button type="button" class="btn btn-sm btn-danger">Supprimer</button></a>

        <hr>

        <ul class="list-group">
            <a href='index.php?action=viewAssociations'>
                <li class="list-group-item">Retour sur la liste des associations</li>
            </a>
        </ul>
    </div>

<?php require 'templateFooter.php'; ?>