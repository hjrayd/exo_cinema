<?php 
session_start();
ob_start(); 
?>
<link rel="stylesheet" href="public/css/accueil.css">
<h2> A l'affiche</h2>

<div class="titre">
<?php

foreach($requete->fetchAll() as $note) { ?>
   <a href="index.php?action=detailFilm&id=<?= $note["id_film"] ?>"><?= $note["titre"] ?></a>
     <p> <?= $note["note"] ?> <p>

<?php } ?>

<!--Mettre image en dessous du titre de chaque film-->
</div>
<h2> Nouveautés </h2>

<div class="nouveautes">
<?php

foreach($requetee->fetchAll() as $nouveaute) { ?>
   <a href="index.php?action=detailFilm&id=<?= $nouveaute["id_film"] ?>"><?= $nouveaute["titre"] ?></a>
      
   
<?php } ?>
</div>


<?php

$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "template.php";