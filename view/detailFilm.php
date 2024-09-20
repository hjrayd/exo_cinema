<?php ob_start();

$film = $requete->fetch();

?>
<div class="detailFilm">
    <h1><?= $film["titre"] ?></h1>
    <img src="<?= $film["afficheFilm"]?>" alt="Affiche du Film">
    <p> Date de sortie : <?= $film["date_sortie"] ?></p>
    <p> Durée : <?= $film["duree"]?> minutes</p>
    <p> Note : <?= $film["note"]?>/5</p>
    <p> Résumé: <?= $film["resume"] ?></p>
    <p> Réalisateur: <a href="index.php?action=detailRealisateurs&id=<?= $film["id_realisateur"] ?>"><?= $film["nom_personne"] ?></a></p>



</div>
<?php

$titre = "Détail du film";
$titre_secondaire = "Détail du film";
$contenu = ob_get_clean();
require "view/template.php";
