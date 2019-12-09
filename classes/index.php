<?php
include 'Etudiant.php';
include 'Module.php';
include 'MoyenneModule.php';
include 'MoyennesEtudiant.php';

$boris = new Etudiant('Moyoto', 'Boris', 18);
$patric = new Etudiant('Andre', 'Patric', 16);

$maths = new Module('Mathématiques', 6);
$francais = new Module('Français', 10);
$sciences = new Module('Sciences', 6);

$moyenneMathsBoris = new MoyenneModule($boris, $maths, 18.5);
$moyenneFrancaisBoris = new MoyenneModule($boris, $francais, 15);
$moyenneSciencesBoris = new MoyenneModule($boris, $sciences, 7);

$moyenneMathsPatric = new MoyenneModule($patric, $maths, 20);
$moyenneFrancaisPatric = new MoyenneModule($patric, $francais, 10);
$moyenneSciencesPatric = new MoyenneModule($patric, $sciences, 0);

$moyennesEtudiantBoris = new MoyennesEtudiant([$moyenneMathsBoris, $moyenneFrancaisBoris, $moyenneSciencesBoris]);
$moyennesEtudiantPatric = new MoyennesEtudiant([$moyenneMathsPatric, $moyenneFrancaisPatric, $moyenneSciencesPatric]);
?>

<h1>Gestion des moyennes</h1>

Moyenne de Boris : <?php $moyennesEtudiantBoris->__toString(); ?><br>
Moyenne de Patric : <?php $moyennesEtudiantPatric->__toString(); ?>