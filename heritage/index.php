<?php

use figures\Cercle;
use figures\Point;
use figures\Rectangle;
use figures\Segment;

require_once('ISurface.php');
require_once('Point.php');
require_once('Segment.php');
require_once('Figure.php');
require_once('Cercle.php');
require_once('Polygone.php');
require_once('Rectangle.php');
require_once('Carre.php');

$circle = new Cercle("vert", new Point("bleu", 5, 6), 5);
$rectangle = new Rectangle(
                "vert",
                new Segment("bleu", new Point("bleu", 5, 6), new Point("bleu", 10, 6)),
                new Segment("bleu", new Point("bleu", 5, 6), new Point("bleu", 5, 8))
            );
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Héritage</title>
</head>
<body>
    <h1>Héritage et polymorphisme</h1>
    <?php echo $circle; ?>
</body>
</html>