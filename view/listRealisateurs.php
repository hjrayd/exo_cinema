<?php ob_start(); ?>

<p> Il y a <?=$requete->rowCount() ?> réalisateurs </p>

<table>
    <thead>
        <tr>
           <th>PRENOM</th>
           <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $realisateur) { ?>
            <tr>
                <td><?= $realisateur["prenom_personne"] ?></td>
                <td><?= $realisateur["nom_personne"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";