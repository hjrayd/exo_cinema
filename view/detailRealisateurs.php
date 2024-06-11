
<?php ob_start();?>

<?php
    foreach($requeteRealisateurs->fetchAll() as $realisateur){ ?>
        <p> Prenom: <?=$realisateur["prenom_personne"]?>
        <p> Nom: <?=$realisateur["nom_personne"]?>
        <p> Sexe: <?=$realisateur["sexe"]?>
        <p> Date de Naissance: <?=$realisateur["nvlle_date"]?>
        
    <?php } ?>

<?php

$titre = "Détail du réalisateur";
$titre_secondaire = "Détail du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";