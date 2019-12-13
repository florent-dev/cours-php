<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
<?php
//var_dump($accounts);
foreach ($secteurs as $secteur) { ?>
    <form method="post" action="index.php?action=viewSecteur&id=<?= $secteur->getId() ?>">
        <label><?= $secteur->getNom(); ?></label>
        <input type="submit" name="viewSecteur" value="Détails">
    </form>
    <?php
}
?>
<br/><br/>
<form method="post" action="index.php?action=addSecteur">
    <table>
        <tr>
            <td>Libelle</td>
            <td><input required type="text" name="libelle"></td>
        </tr>
    </table>
    <input type="submit" name="add" value="Ajouter">
</form>
<br/><br/><a href="index.php?action=viewStructures">Liste des structures</a>
</body>

</html>
