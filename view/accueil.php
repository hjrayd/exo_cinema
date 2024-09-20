<?php 
session_start();
ob_start(); 
?>

<a href="./"></a>
   <h2> A l'affiche</h2>
   
      <div id="wrapper">
         <div class="titre">
            <?php

            foreach($requete->fetchAll() as $aLaffiche) { ?>
            <a href="index.php?action=detailFilm&id=<?= $aLaffiche["id_film"] ?>"><?= $aLaffiche["titre"] ?></a>
            <img src="<?= $aLaffiche["afficheFilm"]?>" alt="Affiche du Film">
            <p> <?= $aLaffiche["note"] ?>


            <?php } ?>

            <!--Mettre image en dessous du titre de chaque film-->
         </div>
         <h2> Nouveautés </h2>

            <div class="nouveautes">
               <?php
               foreach($requetee->fetchAll() as $nouveaute) { ?>
               <a href="index.php?action=detailFilm&id=<?= $nouveaute["id_film"] ?>"><?= $nouveaute["titre"] ?></a>
               <img src="<?= $nouveaute["afficheFilm"]?>" alt="Affiche du Film">
               
      
               <?php } ?>
            </div>
      </div>

<?php

$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "template.php";