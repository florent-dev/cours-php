<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gestion des secteurs</h1>
        </div>
    </div>

    <?php foreach ($secteurs as $secteur) { ?>
        <a href='index.php?action=viewSecteur&id=<?= $secteur->getId() ?>'><li class="list-group-item"><?= $secteur->getNom(); ?></li></a>
    <?php } ?>

    <form method="post" action="index.php?action=addSecteur" class="mt-5 mb-5">
        <h2>Ajouter un secteur</h2>

        <div class="form-group row">
            <label for="libelle" class="col-sm-2 col-form-label">Nom du secteur</label>
            <div class="col-sm-10">
                <input required type="text" name="libelle" id="libelle" />
            </div>
        </div>

        <input type="submit" class="btn btn-primary mb-2" name="add" value="Ajouter le secteur">
    </form>

    <hr>

    <ul class="list-group">
        <a href='index.php?action=viewStructures'><li class="list-group-item">Liste des structures</li></a>
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>