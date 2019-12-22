<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Association <?= $structure->getNom() ?></h1>
            </div>
        </div>

        <div>Id : <?= $structure->getId() ?></div>
        <div>Nom : <?= $structure->getNom() ?></div>
        <div>Rue : <?= $structure->getRue() ?></div>
        <div>CP : <?= $structure->getCp() ?></div>
        <div>Ville : <?= $structure->getVille() ?></div>
        <div>Nombre de donateurs : <?= $structure->getNbdonateurs() ?></div>

        <a href='index.php?action=editorAssociation&id=<?= $structure->getId() ?>'><button type="button" class="btn btn-sm btn-info">Modifier</button></a>
        <a href='index.php?action=deleteStructure&id=<?= $structure->getId() ?>'><button type="button" class="btn btn-sm btn-danger">Supprimer</button></a>

        <hr>

        <ul class="list-group">
            <a href='index.php?action=viewAssociations'>
                <li class="list-group-item">Retour sur la liste des associations</li>
            </a>
        </ul>
    </div>

<?php require 'templateFooter.php'; ?>