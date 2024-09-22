<?php ob_start(); ?>


    <p class="nombre-list"> Il y a <?=$requete->rowCount() ?> réalisateurs </p>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Réalisateurs</th>
            
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($requete->fetchAll() as $realisateur) { ?>
                <tr>
                <td><a href="index.php?action=detailRealisateurs&id=<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["prenom_personne"] ?> <?= $realisateur["nom_personne"] ?></a></td>
                
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="button">
            <button><a href="index.php?action=addRealisateur">Ajouter un Réalisateur</a></button>
        
    </div>
<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
