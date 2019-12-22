<?php require 'templateHeader.php'; ?>

    <div class="container">
        <hr class="mt-5">
        <h1>Liste des associations</h1>

        <?php foreach ($associations as $association) { ?>
            <a href="index.php?action=viewAssociation&id=<?= $association->getId() ?>" class="btn btn-dark btn-sm mt-2">
                <?= $association->getNom(); ?>
            </a>
        <?php } ?>

        <a href="index.php?action=editorAssociation" class="btn btn-success btn-sm mt-2">+ Association</a>

        <hr class="mb-5">

        <p class="mt-4">
            <a href="index.php" class="btn btn-info">
                Voir toutes les structures
            </a>

            <a href="index.php?action=viewEntreprises" class="btn btn-info">
                Voir les entreprises
            </a>
        </p>
    </div>

<?php require 'templateFooter.php'; ?>