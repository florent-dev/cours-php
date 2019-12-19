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

        <?php if ($structure->getEstAssocie()) { ?>
            <div>Nombre de donateurs :<?= $structure->getNbdonateurs() ?></div>
        <?php } else { ?>
            <div>Nombre de d'actionnaires : <?= $structure->getNbactionnaires() ?></div>
        <?php } ?>

        <a href='index.php?action=<?= (($structure->getEstAssocie()) ? "editorAssociation" : "editorEntreprise" )?>&id=<?= $structure->getId() ?>'><button type="button" class="btn btn-sm btn-info">Modifier</button></a>
        <a href='index.php?action=<?= (($structure->getEstAssocie()) ? "deleteAssociation" : "deleteEntreprise" )?>&id=<?= $structure->getId() ?>'><button type="button" class="btn btn-sm btn-danger">Supprimer</button></a>

        <hr>

        <ul class="list-group">
            <a href='index.php?action=viewStructures'>
                <li class="list-group-item">Retour sur la liste des structures</li>
            </a>
            <a href='index.php'>
                <li class="list-group-item">Retourner sur l'accueil</li>
            </a>
        </ul>
    </div>

<?php require 'templateFooter.php'; ?>