<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gestion des structures</h1>
        </div>
    </div>

    <h2>Liste des structures</h2>
    <?php foreach ($structures as $structure) { ?>
        <a href='index.php?action=<?= (($structure->getEstAssocie()) ? "viewAssociation" : "viewEntreprise" )?>&id=<?= $structure->getId() ?>'><button type="button" class="btn btn-sm btn-dark mt-2"><?= $structure->getNom(); ?></button></a>
    <?php } ?>

    <p class="mt-4">
        <a href='index.php?action=editorStructure'><button type="button" class="btn btn-info">Ajouter une structure</button></a>
    </p>

    <hr>

    <ul class="list-group">
        <a href='index.php?action=viewSecteurs'><li class="list-group-item">Liste des secteurs</li></a>
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>