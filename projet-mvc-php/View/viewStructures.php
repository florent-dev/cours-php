<?php $title = 'Liste des structures'; ?>
<?php require 'templateHeader.php'; ?>

<div class="container">
    <hr class="mt-5">
    <h1>Liste des <?= $terminologie['pluriel'] ?></h1>

    <?php foreach ($structures as $structure) { ?>
        <a href="index.php?action=viewStructure&id=<?= $structure->getId() ?>" class="btn btn-dark btn-sm mt-2">
            <?= $structure->getNom(); ?>
        </a>
    <?php } ?>

    <a href="index.php?action=editorStructure" class="btn btn-success btn-sm mt-2">+</a>

    <hr class="mb-5">

    <p class="mt-4">
        <a href="index.php?action=viewStructures" class="btn btn-info">
            Voir toutes les structures
        </a>

        <a href="index.php?action=viewEntreprises" class="btn btn-info">
            Voir seulement les entreprises
        </a>

        <a href="index.php?action=viewAssociations" class="btn btn-info">
            Voir seulement les associations
        </a>
    </p>
</div>

<?php require 'templateFooter.php'; ?>