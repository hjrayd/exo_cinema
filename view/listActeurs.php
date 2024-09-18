<?php ob_start(); ?>

<p> Il y a <?=$requete->rowCount() ?> acteurs </p>

<table>
    <thead>
        <tr>
           <th>PRENOM</th>
           <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $acteur) { ?>
            <tr>
            <td><a href="index.php?action=detailActeurs&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["prenom_personne"] ?></a></td>
            <td><a href="index.php?action=detailActeurs&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["nom_personne"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    <div class="button">
        <button><a href="index.php?action=addActeur">Ajouter un acteur</a></button>
    </div>
<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";