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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
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
                <a class="nav-link" href="index.php?action=viewEntreprises">Entreprises</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=viewAssociations">Associations</a>
            </li>
        </ul>
    </div>
</nav>