<?php ob_start(); ?>

<p> Il y a <?=$requete->rowCount() ?> genres </p>

<table>
    <thead>
        <tr>
           <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $genre) { ?>
            <tr>
            <td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";