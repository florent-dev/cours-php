<?php require 'templateHeader.php'; ?>

    <div class="container">
        <hr class="mt-5">
        <h1>Liste des entreprises</h1>

        <?php foreach ($entreprises as $entreprise) { ?>
            <a href="index.php?action=viewEntreprise&id=<?= $entreprise->getId() ?>" class="btn btn-dark btn-sm mt-2">
                <?= $entreprise->getNom(); ?>
            </a>
        <?php } ?>

        <a href="index.php?action=editorEntreprise" class="btn btn-success btn-sm mt-2">+ Entreprise</a>

        <hr class="mb-5">

        <p class="mt-4">
            <a href="index.php" class="btn btn-info">
                Voir toutes les structures
            </a>

            <a href="index.php?action=viewAssociations" class="btn btn-info">
                Voir les associations
            </a>
        </p>
    </div>

<?php require 'templateFooter.php'; ?>