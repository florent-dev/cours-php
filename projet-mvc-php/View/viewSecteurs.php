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
        <button type="button" class="btn btn-success btn-sm mt-2">+</button>
    </a>

    <hr class="mb-5">

</div>

<?php require 'templateFooter.php'; ?>