<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"><?= $title ?></h1>
            </div>
        </div>

        <form method="post" action="<?= $action ?>" class="mt-5 mb-5">
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Nom de l'entreprise" name="nom" id="nom"
                        <?php if (isset($entreprise)) echo 'value="'.$entreprise->getNom().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="rue" class="col-sm-2 col-form-label">Rue</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Rue" name="rue" id="rue"
                        <?php if (isset($entreprise)) echo 'value="'.$entreprise->getRue().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="cp" class="col-sm-2 col-form-label">Code Postal</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Code postal" name="cp" id="cp"
                           minlength="5" maxlength="5"
                        <?php if (isset($entreprise)) echo 'value="'.$entreprise->getCp().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="ville" class="col-sm-2 col-form-label">Ville</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Ville" name="ville" id="ville"
                        <?php if (isset($entreprise)) echo 'value="'.$entreprise->getVille().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="secteurs" class="col-sm-2 col-form-label">Secteur principal</label>
                <div class="col-sm-10">
                    <select required multiple class="selectpicker form-control" name="secteurs[]" id="secteurs">
                        <?php foreach ($secteurs as $secteur) { ?>
                            <?php $selected = (in_array($secteur->getId(), $linkedSecteurs)) ? 'selected' : ''; ?>
                            <option value="<?= $secteur->getId() ?>" <?= $selected ?>><?= $secteur->getLibelle() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="nb_actionnaires" class="col-sm-2 col-form-label">Nb d'actionnaires</label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control" placeholder="Nombre d'actionnaires"
                           name="nb_actionnaires" id="nb_actionnaires" value="0" min="0"
                        <?php if (isset($entreprise)) echo 'value="'.$entreprise->getNbActionnaires().'"'; ?> />
                </div>
            </div>

            <?php if ( isset($entreprise) ) { ?>
                <input type="hidden" name="id" id="id" value="<?= $entreprise->getId() ?>">
            <?php } ?>

            <input type="submit" class="btn btn-primary mb-2" name="add" value="Valider le formulaire">
        </form>
    </div>

<?php require 'templateFooter.php'; ?>