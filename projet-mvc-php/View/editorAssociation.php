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
                    <input required type="text" class="form-control" placeholder="Nom de l'association" name="nom" id="nom"
                        <?php if (isset($association)) echo 'value="'.$association->getNom().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="rue" class="col-sm-2 col-form-label">Rue</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Rue" name="rue" id="rue"
                        <?php if (isset($association)) echo 'value="'.$association->getRue().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="cp" class="col-sm-2 col-form-label">Code Postal</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Code postal" name="cp" id="cp"
                           minlength="5" maxlength="5"
                        <?php if (isset($association)) echo 'value="'.$association->getCp().'";' ?> />
                </div>
            </div>

            <div class="form-group row">
                <label for="ville" class="col-sm-2 col-form-label">Ville</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" placeholder="Ville" name="ville" id="ville"
                        <?php if (isset($association)) echo 'value="'.$association->getVille().'";' ?> />
                </div>
            </div>

            <?php if ( is_null($association) ) { ?>
                <div class="form-group row">
                    <label for="secteurs" class="col-sm-2 col-form-label">Secteur principal</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="secteurs" id="secteurs">
                            <?php foreach ($secteurs as $secteur) { ?>
                                <option value="<?= $secteur->getId() ?>"><?= $secteur->getLibelle() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php } ?>

            <div class="form-group row">
                <label for="nb_donateurs" class="col-sm-2 col-form-label">Nb de donateurs (si association)</label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control" placeholder="Nombre de donateurs"
                           name="nb_donateurs" id="nb_donateurs" value="0" min="0"
                        <?php if (isset($association)) echo 'value="'.$association->getNbDonateurs().'";' ?> />
                </div>
            </div>

            <?php if ( isset($association) ) { ?>
                <input type="hidden" name="id" id="id" value="<?= $association->getId() ?>">
            <?php } ?>

            <input type="submit" class="btn btn-primary mb-2" name="add" value="Valider le formulaire">
        </form>
    </div>

<?php require 'templateFooter.php'; ?>