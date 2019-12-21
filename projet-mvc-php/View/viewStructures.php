<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Gestion des <?= $terminologie['pluriel'] ?></h1>
            </div>
        </div>

        <h2>Liste des <?= $terminologie['pluriel'] ?></h2>
        <?php foreach ($structures as $structure) { ?>
            <a href='index.php?action=viewStructure&id=<?= $structure->getId() ?>'>
                <button type="button" class="btn btn-sm btn-dark mt-2"><?= $structure->getNom(); ?></button>
            </a>
        <?php } ?>

        <p class="mt-4">
            <a href='index.php?action=editorStructure'>
                <button type="button" class="btn btn-success">Ajouter une structure</button>
            </a>

            <a href='index.php?action=viewStructures'>
                <button type="button" class="btn btn-info">Voir toutes les structures</button>
            </a>

            <a href='index.php?action=viewEntreprises'>
                <button type="button" class="btn btn-info">Voir seulement les entreprises</button>
            </a>

            <a href='index.php?action=viewAssociations'>
                <button type="button" class="btn btn-info">Voir seulement les associations</button>
            </a>
        </p>
    </div>

<?php require 'templateFooter.php'; ?>