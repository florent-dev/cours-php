<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<?php
//var_dump($accounts);
foreach ($structures as $structure) { ?>
    <form method="post" action="index.php?action=viewStructure&id=<?= $structure->getId()?>">
        <label><?= $structure->getName(); ?></label>
        <input type="submit" name="viewAccount" value="Détails"/>
    </form>
<?php
}
?>
<br/><br/><form method="post" action="index.php?action=addStructure">
    <table>
        <tr><td>Nom</td><td><input required type="text" name="nom"></td></tr>
        <tr><td>Rue</td><td><input required type="text" name="rue"></td></tr>
        <tr><td>Cp</td><td><input required type="text" name="cp"></td></tr>
        <tr><td>Ville</td><td><input required type="text" name="ville"></td></tr>
        <tr><td>Est associé</td><td><input required type="text" name="estasso"></td></tr>
        <tr><td>Nombre de donateurs</td><td><input type="text" name="nb_donateurs"></td></tr>
        <tr><td>Nombre d'actionnaires</td><td><input type="text" name="nb_actionnaires"></td></tr>
    </table>
    <input type="submit" name="add" value="Ajouter">
</form>
<br/><br/><a href="index.php?action=viewSecteurs">Liste des secteurs</a>
</body>
</html>