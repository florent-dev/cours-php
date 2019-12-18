<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Gestion des structures</h1>
            </div>
        </div>

        <form method="post" action="<?= $action ?>" class="mt-5 mb-5">
            <h2><?= $title ?></h2>

            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Nom de la structure" name="nom" id="nom"
                        <?php if (isset($structure)) echo "value='$structure->getNom()'"; ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="rue" class="col-sm-2 col-form-label">Rue</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Rue" name="rue" id="rue"
                        <?php if (isset($structure)) echo "value='$structure->getRue()'"; ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="cp" class="col-sm-2 col-form-label">Code Postal</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Code postal" name="cp" id="cp" minlength="5" maxlength="5"
                        <?php if (isset($structure)) echo "value='$structure->getCodePostal()'"; ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="ville" class="col-sm-2 col-form-label">Ville</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Ville" name="ville" id="ville"
                        <?php if (isset($structure)) echo "value='$structure->getVille()'"; ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="secteurs" class="col-sm-2 col-form-label">Secteurs associés</label>
                <div class="col-sm-10">
                    <select required class="form-control" name="secteurs" id="secteurs">
                        <?php foreach ($secteurs as $secteur) { ?>
                            <option value="<?= $secteur->getId() ?>"><?= $secteur->getLibelle() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="estasso" class="col-sm-2 col-form-label">Association ?</label>
                <div class="col-sm-10">
                    <input type="radio" name="estasso" id="estasso_oui" value="1" />
                    <label for="estasso_oui">Oui</label>
                    <input type="radio" name="estasso" id="estasso_non" value="0" checked />
                    <label for="estasso_non">Non</label>
                </div>
            </div>

            <div class="form-group row">
                <label for="nb_donateurs" class="col-sm-2 col-form-label">Nb de donateurs (si association)</label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control" placeholder="Nombre de donateurs" name="nb_donateurs" id="nb_donateurs" value="0" min="0"
                        <?php if (isset($structure)) echo "value='$structure->getNbDonateurs()'"; ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="nb_actionnaires" class="col-sm-2 col-form-label">Nb d'actionnaires (si société)</label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control" placeholder="Nombre d'actionnaires" name="nb_actionnaires" id="nb_actionnaires" value="0" min="0"
                        <?php if (isset($structure)) echo "value='$structure->getNbActionnaires()'"; ?> />
                </div>
            </div>

            <input type="hidden" name="id" id="id" value="<?= $secteur->getId() ?>">

            <input type="submit" class="btn btn-primary mb-2" name="add" value="Ajouter la structure">
        </form>

        <hr>

        <ul class="list-group">
            <a href='index.php?action=viewSecteurs'><li class="list-group-item">Liste des secteurs</li></a>
            <a href='index.php'><li class="list-group-item">Retourner sur l'accueil</li></a>
        </ul>
    </div>

<?php require 'templateFooter.php'; ?>