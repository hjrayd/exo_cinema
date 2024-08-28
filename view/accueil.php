<?php 
session_start();
ob_start(); 
?>

<h2> A l'affiche</h2>


<?php

foreach($requete->fetchAll() as $note) { ?>
   <a href="index.php?action=detailFilm&id=<?= $note["id_film"] ?>"><?= $note["titre"] ?></a>
     <p> <?= $note["note"] ?> <p>

<?php } ?>

<!--Mettre image en dessous du titre de chaque film-->

<h2> Nouveautés </h2>


<?php

foreach($requetee->fetchAll() as $nouveaute) { ?>
   <a href="index.php?action=detailFilm&id=<?= $nouveaute["id_film"] ?>"><?= $nouveaute["titre"] ?></a>
      
   
<?php } ?>



<?php

$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "template.php";