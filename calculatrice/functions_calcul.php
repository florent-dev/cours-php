<?php

/**
 ** Envoi du formulaire
 */

// Enregistrer un calcul
if (isset($_POST['submitEnregistrer'])) {
    setcookie('nombre_1', $_POST['nombre_1'], time() + 60*60*60);
    setcookie('operande', $_POST['operande'], time() + 60*60*60);
    setcookie('nombre_2', $_POST['nombre_2'], time() + 60*60*60);
    $_COOKIE['nombre_1'] = $_POST['nombre_1'];
    $_COOKIE['operande'] = $_POST['operande'];
    $_COOKIE['nombre_2'] = $_POST['nombre_2'];
}

// Effacer le calcul enregistré
if (isset($_POST['submitEffaceEnregistre'])) {
    setcookie('nombre_1', '', time() - 1);
    setcookie('operande', '', time() - 1);
    setcookie('nombre_2', '', time() - 1);
    unset($_COOKIE['nombre_1']);
    unset($_COOKIE['operande']);
    unset($_COOKIE['nombre_2']);
}

// On définit nos variables pour le calcul
// Si on a les données en cookies et qu'un calcul n'est pas submit, on reprend ces valeurs
// Puis, si les valeurs existent bien, on définit nos variables
$source = ( isset($_COOKIE['nombre_1']) && !isset($_POST['submitCalculer']) ) ? $_COOKIE : $_POST;

if (isset($source['nombre_1'])) {
    $nombre_1 = $source['nombre_1'];
    $nombre_2 = $source['nombre_2'];
    $operande = $source['operande'];
}


/**
 ** Fonctions générales
 */

// Calculer le résultat selon les deux nombres et l'opérande indiqués
function calculerResultat() {
    global $operande, $nombre_1, $nombre_2;
    if (isset($operande)) {
        switch ($operande) {
            case 'moins': return $nombre_1 - $nombre_2; break;
            case 'multiplication': return $nombre_1 * $nombre_2; break;
            
            case 'division':
            if ($nombre_2 != "0") {
                return $nombre_1 / $nombre_2;
            } else {
                return "Erreur, division par 0 interdite";
            }
            break;

            default: return $nombre_1 + $nombre_2;
        }
    }
}

// Sélection de l'opérande
function restaurerOperande($nomOperande) {
    global $operande;
    if (isset($operande) && $operande == $nomOperande) {
        echo "selected";
    }
}

// On restaure la valeur des inputs
function restaurerValeurInput($numInputNombre) {
    global $source;
    if (isset($source['nombre_'.$numInputNombre])) {
        echo 'value="'.$source['nombre_'.$numInputNombre].'"';
    }
}

function afficherBoutonEffacerCookies() {
    if (isset($_COOKIE['nombre_1'])) {
        echo '<input type="submit" name="submitCalculEnregistre" value="Montrer le calcul enregistré">';
        echo '<input type="submit" name="submitEffaceEnregistre" value="Effacer le calcul enregistré">';
    }
}

function afficherResultat() {
    global $nombre_1;
    if (isset($nombre_1)) {
        echo "<br><hr>Résultat : " . calculerResultat();
    }
}