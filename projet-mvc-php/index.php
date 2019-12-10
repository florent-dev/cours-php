<?php
require_once("./Controller/HomeController.php");

try {
    if (isset($_GET["action"])) {
        if (stripos($_GET["action"], "Accueil")) {
            $controler = new HomeController();
            $accounts = $controler->viewHome();
        } else {
            $error = "Erreur : action non reconnue<br/>";
        }
    } else {
        ?>
        <a href="index.php?action=viewAccueil">bouton temporaire</a><br/>
        <?php
    }

} catch (Exception $e) {
    $error = "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . str_replace("\n", "<br/>", $e->getTraceAsString());
}
if (isset($error)) {
    require(__DIR__ . '/View/error.php');
}


