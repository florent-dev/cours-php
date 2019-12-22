<?php $title = 'Editeur de secteur'; ?>
<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Éditeur de secteur</h1>
            </div>
        </div>

        <form method="post" action="<?= $action ?>" class="mt-5 mb-5">
            <h2><?= $title ?></h2>

            <div class="form-group row">
                <label for="libelle" class="col-sm-2 col-form-label">Nom du secteur</label>
                <div class="col-sm-10">
                    <input required type="text" name="libelle" id="libelle" value="<?php if(null !== $secteur) echo $secteur->getLibelle(); ?>" />
                    <input type="hidden" name="id" id="id" value="<?php if(null !== $secteur) echo $secteur->getId(); ?>">
                </div>
            </div>

            <input type="submit" class="btn btn-primary mb-2" name="add" value="Valider le formulaire">
        </form>

        <hr>

        <ul class="list-group">
            <?php if (null !== $secteur) { ?>
                <a href='index.php?action=viewSecteur&id=<?= $secteur->getId() ?>'><li class="list-group-item">Retour sur la fiche du secteur</li></a>
            <?php } ?>
        </ul>
    </div>

<?php require 'templateFooter.php'; ?>