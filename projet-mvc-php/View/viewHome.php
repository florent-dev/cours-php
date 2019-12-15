<?php require 'templateHeader.php'; ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Accueil</h1>
            <p class="lead">Bienvenue sur votre gestionnaire de secteurs et structures</p>
        </div>
    </div>

    <ul class="list-group">
        <a href='index.php?action=viewStructures'><li class="list-group-item">Consulter et gérer la liste des structures</li></a>
        <a href='index.php?action=viewSecteurs'><li class="list-group-item">Consulter et gérer la liste des secteurs</li></a>
    </ul>
</div>

<?php require 'templateFooter.php'; ?>