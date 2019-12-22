<?php $title = 'Accueil'; ?>
<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Accueil</h1>
            <p class="lead">Bienvenue sur votre gestionnaire de secteurs et structures</p>
        </div>
    </div>

    <ul class="list-group">
        <a href='index.php?action=viewSecteurs'><li class="list-group-item">Gérer les secteurs</li></a>
        <a href='index.php?action=viewStructures'><li class="list-group-item">Gérer les structures</li></a>
        <a href='index.php?action=viewAssociations'><li class="list-group-item">Gérer les associations</li></a>
        <a href='index.php?action=viewEntreprises'><li class="list-group-item">Gérer les entreprises</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>