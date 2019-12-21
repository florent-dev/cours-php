<?php require 'templateHeader.php'; ?>

    <div class="container">
        <hr class="mt-5">
        <h1>Liste des <?= $terminologie['pluriel'] ?></h1>

        <?php foreach ($structures as $structure) { ?>
            <a href='index.php?action=viewStructure&id=<?= $structure->getId() ?>'>
                <button type="button" class="btn btn-sm btn-dark mt-2"><?= $structure->getNom(); ?></button>
            </a>
        <?php } ?>

        <hr class="mb-5">

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