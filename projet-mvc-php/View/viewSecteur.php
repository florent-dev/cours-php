<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
Id : <?= $secteur->getId() ?><br/>
Name : <?= $secteur->getLibelle() ?><br/>
<a href="index.php?action=viewStructures">Liste des structures</a><br/>
<a href="index.php?action=viewSecteurs">Liste des secteurs</a>
</body>

</html>
