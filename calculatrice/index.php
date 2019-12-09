<?php
session_start();
include 'functions_calcul.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Calculatrice</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css" />  
</head>

<body>
    <div class="container">
        <form method="post">

            <input type="number" name="nombre_1" id="nombre_1" <?php restaurerValeurInput(1); ?> />

            <select name="operande" id="operande">
                <option value="plus" <?= restaurerOperande('plus') ?>>+</option>
                <option value="moins" <?= restaurerOperande('moins') ?>>-</option>
                <option value="multiplication" <?= restaurerOperande('multiplication') ?>>*</option>
                <option value="division" <?= restaurerOperande('division') ?>>/</option>
            </select>

            <input type="number" name="nombre_2" id="nombre_2" <?php restaurerValeurInput(2); ?> />
            
            <br>

            <input type="submit" name="submitCalculer" value="Calculer">
            <input type="submit" name="submitEnregistrer" value="Enregistrer">

            <?php afficherBoutonEffacerCookies(); ?>
            <?php afficherResultat(); ?>

        </form>
    </div>
</body>

</html>