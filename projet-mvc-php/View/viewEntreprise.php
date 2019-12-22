<?php $title = 'Détail d\'une entreprise'; ?>
<?php require 'templateHeader.php'; ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Entreprise <?= $entreprise->getNom() ?></h1>
            </div>
        </div>

        <div>Id : <?= $entreprise->getId() ?></div>
        <div>Nom : <?= $entreprise->getNom() ?></div>
        <div>Rue : <?= $entreprise->getRue() ?></div>
        <div>CP : <?= $entreprise->getCp() ?></div>
        <div>Ville : <?= $entreprise->getVille() ?></div>
        <div>Nombre d'actionnaires : <?= $entreprise->getNbactionnaires() ?></div>

        <a href='index.php?action=editorEntreprise&id=<?= $entreprise->getId() ?>'><button type="button" class="btn btn-sm btn-info">Modifier</button></a>
        <a href='index.php?action=deleteStructure&id=<?= $entreprise->getId() ?>'><button type="button" class="btn btn-sm btn-danger">Supprimer</button></a>

        <hr>

        <ul class="list-group">
            <a href='index.php?action=viewEntreprises'>
                <li class="list-group-item">Retour sur la liste des entreprises</li>
            </a>
        </ul>
    </div>

<?php require 'templateFooter.php'; ?>