<?php
if (!isset($title)) {
    $title = 'Accueil';
}
?>

<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <link href="View/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="View/js/bootstrap-grid.js"></script>
    <script src="View/js/jquery-3.4.1.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Gestionnaire de structures</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=viewSecteurs">Secteurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=viewStructures">Toutes les structures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=viewEntreprises">Entreprises</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=viewAssociations">Associations</a>
            </li>
        </ul>
    </div>
</nav>