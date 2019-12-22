<?php $title = 'Liste des structures'; ?>
<?php require 'templateHeader.php'; ?>

    <div class="container">
        <hr class="mt-5">
        <h1>Liste des secteurs</h1>

        <?php foreach ($secteurs as $secteur) { ?>
            <a href="index.php?action=viewSecteur&id=<?= $secteur->getId() ?>" class="btn btn-dark disabled btn-sm mt-2">
                <?= $secteur->getLibelle(); ?>
            </a>
        <?php } ?>

        <p class="mt-3">
            <a href="index.php?action=viewSecteurs" class="btn btn-info">
                Gérer les secteurs
            </a>
        </p>

        <hr class="mt-5">
        <h1>Liste de toutes les structures</h1>

        <?php foreach ($structures as $structure) { ?>
            <a href="index.php?action=view<?= $structure->__toString() ?>&id=<?= $structure->getId() ?>" class="btn btn-dark disabled btn-sm mt-2">
                <?= $structure->getNom(); ?>
            </a>
        <?php } ?>

        <p class="mt-3">
            <a href="index.php?action=viewAssociations" class="btn btn-info">
                Gérer les structures
            </a>
        </p>

        <hr class="mb-5">
    </div>

<?php require 'templateFooter.php'; ?>