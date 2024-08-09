<?php 
session_start();
ob_start(); 
?>

<h2> A l'affiche</h2>

<?php

foreach($requete->fetchAll() as $note) { ?>
   <a href="index.php?action=accueil&id=<?= $note["id_film"] ?>"><?= $note["titre"] ?>
      <?= $note["note"] ?>
   
<?php } ?>

<?php

$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "template.php";