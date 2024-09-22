<?php 
session_start();
ob_start(); 
?>

<div id="wrapper">

   
      <section class="home swiper" id="home">
        
         <div class="swiper-wrapper">
            <?php
            foreach($requete->fetchAll() as $aLaffiche) { ?>
            <div class="swiper-slide container">
               <img src="<?= $aLaffiche["afficheFilm"]?>" alt="Affiche du Film">
               <div class="home-text">
                  <p class="titre-film"><?= $aLaffiche["titre"] ?></p>
                  <p class="resume-film"> Résumé : <?= $aLaffiche["resume"] ?></p>
                  <p>Note: <?= $aLaffiche["note"] ?>/5 </p>
                  <a href="index.php?action=detailFilm&id=<?=$aLaffiche["id_film"]?>">Détails du film</a>
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
            </div>
               <?php } ?>
         </div>
</section>
         <h2 class="nouveaute-titre"> Nouveautés </h2>

            <div class="nouveautes">
               <?php
               foreach($requetee->fetchAll() as $nouveaute) { ?>
               <div class="nouveaute">
                  <img src="<?= $nouveaute["afficheFilm"]?>" alt="Affiche du Film">
                  <a href="index.php?action=detailFilm&id=<?= $nouveaute["id_film"] ?>"><?= $nouveaute["titre"] ?></a>
               </div>
                  <?php } ?>
              
            </div>
      </div>

<?php

$titre = "Accueil";
$titre_secondaire = "A l'affiche";
$contenu = ob_get_clean();
require "template.php";