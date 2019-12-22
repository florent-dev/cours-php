<?php $title = 'Liste des secteurs'; ?>
<?php require 'templateHeader.php'; ?>

<div class="container">
    <hr class="mt-5">
    <h1>Liste des secteurs</h1>

    <?php foreach ($secteurs as $secteur) { ?>
        <a href="index.php?action=viewSecteur&id=<?= $secteur->getId() ?>" class="btn btn-sm btn-dark mt-2">
            <?= $secteur->getLibelle(); ?>
        </a>
    <?php } ?>

    <a href='index.php?action=editorSecteur'>
        <button type="button" class="btn btn-success btn-sm mt-2">+ Secteur</button>
    </a>

    <hr class="mb-5">

    <p class="mt-4">
        <a href="index.php" class="btn btn-info">
            Retour sur l'accueil
        </a>
    </p>

</div>

<?php require 'templateFooter.php'; ?>