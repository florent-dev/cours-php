<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<?php
//var_dump($account);
?>
Id : <?= $structure->getId() ?><br/>
Nom : <?= $structure->getNom() ?><br/>
Rue : <?= $structure->getRue() ?><br/>
CP : <?= $structure->GetCp() ?><br/>
Ville : <?= $structure->getVille() ?><br/>
Est associé : <?= $structure->getEstAssocie() ?><br/>
Nombre de donateurs : <?= $structure->getNbDonateurs() ?><br/><br/>
Nombre de d'actionnaires : <?= $structure->getNbActionnaires() ?><br/><br/>
<a href="index.php?action=viewStructures">Liste des structures</a><br/>
<a href="index.php?action=viewSecteurs">Liste des secteurs</a>
</body>
</html>
