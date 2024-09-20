<?php 
session_start();
ob_start(); 
?>


   <h2> A l'affiche</h2>
   
      <div id="wrapper">
         <div class="titre">
            <?php
            foreach($requete->fetchAll() as $aLaffiche) { ?>
            <div class="test">
               <img src="<?= $aLaffiche["afficheFilm"]?>" alt="Affiche du Film">
               <a href="index.php?action=detailFilm&id=<?= $aLaffiche["id_film"] ?>"><?= $aLaffiche["titre"] ?></a>
               <p> <?= $aLaffiche["note"] ?>/5 </p>
            </div>
               <?php } ?>
         </div>

         <h2> Nouveautés </h2>

            <div class="nouveautes">
               <?php
               foreach($requetee->fetchAll() as $nouveaute) { ?>
               <div class="nouveaute">
                  <img src="<?= $nouveaute["afficheFilm"]?>" alt="Affiche du Film">
                  <a href="index.php?action=detailFilm&id=<?= $nouveaute["id_film"] ?>"><?= $nouveaute["titre"] ?></a>
                  
                  <?php } ?>
               </div>
            </div>
      </div>

<?php

$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "template.php";