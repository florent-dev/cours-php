<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gestion des structures</h1>
        </div>
    </div>

    <h2>Liste des structures</h2>
    <?php foreach ($structures as $structure) { ?>
        <a href='index.php?action=viewStructure&id=<?= $structure->getId() ?>'><li class="list-group-item"><?= $structure->getNom(); ?></li></a>
    <?php } ?>

    <form method="post" action="index.php?action=addStructure" class="mt-5 mb-5">
        <h2>Ajouter une structure</h2>

        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" placeholder="Nom de la structure" name="nom" id="nom">
            </div>
        </div>

        <div class="form-group row">
            <label for="rue" class="col-sm-2 col-form-label">Rue</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Rue" name="rue" id="rue">
            </div>
        </div>

        <div class="form-group row">
            <label for="cp" class="col-sm-2 col-form-label">Code Postal</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" placeholder="Code postal" name="cp" id="cp" minlength="5" maxlength="5">
            </div>
        </div>

        <div class="form-group row">
            <label for="ville" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" placeholder="Ville" name="ville" id="ville">
            </div>
        </div>

        <div class="form-group row">
            <label for="estasso" class="col-sm-2 col-form-label">Secteur</label>
            <div class="col-sm-10">
                <input required type="number" class="form-control" placeholder="Secteur associé" name="estasso" id="estasso" min="1">
            </div>
        </div>

        <div class="form-group row">
            <label for="nb_donateurs" class="col-sm-2 col-form-label">Nombre de donateurs</label>
            <div class="col-sm-10">
                <input required type="number" class="form-control" placeholder="Nombre de donateurs" name="nb_donateurs" id="nb_donateurs" value="0" min="0">
            </div>
        </div>

        <div class="form-group row">
            <label for="nb_actionnaires" class="col-sm-2 col-form-label">Nombre d'actionnaires</label>
            <div class="col-sm-10">
                <input required type="number" class="form-control" placeholder="Nombre d'actionnaires" name="nb_actionnaires" id="nb_actionnaires" value="0" min="0">
            </div>
        </div>

        <input type="submit" class="btn btn-primary mb-2" name="add" value="Ajouter la structure">
    </form>

    <hr>

    <ul class="list-group">
        <a href='index.php?action=viewSecteurs'><li class="list-group-item">Liste des secteurs</li></a>
        <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>