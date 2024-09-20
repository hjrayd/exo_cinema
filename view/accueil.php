<?php 
session_start();
ob_start(); 
?>


   <h2> A l'affiche</h2>
      <div id="wrapper">
         <div class="titre">
            <?php

            foreach($requete->fetchAll() as $aLaffiche) { ?>
            <a href="index.php?action=detailFilm&id=<?= $aLaffiche["id_film"] ?>"><?= $aLaffiche["titre"] ?></a>
            <p> <?= $aLaffiche["note"] ?> <p>
            


            <?php } ?>

            <!--Mettre image en dessous du titre de chaque film-->
         </div>
         <h2> Nouveautés </h2>

            <div class="nouveautes">
               <?php

               foreach($requetee->fetchAll() as $nouveaute) { ?>
               <a href="index.php?action=detailFilm&id=<?= $nouveaute["id_film"] ?>"><?= $nouveaute["titre"] ?></a>
               <?php $afficheFilm = "./public/image/" .$nouveaute["titre"].".jpg"; ?>
               <img src="<?= htmlspecialchars($afficheFilm) ?>" alt="Affiche du film <?= htmlspecialchars($nouveaute["titre"]) ?>" />
      
               <?php } ?>
            </div>
      </div>

<?php

$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "template.php";