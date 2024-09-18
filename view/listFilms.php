<?php ob_start(); ?>

<p> Il y a <?=$requete->rowCount() ?> films </p>

<table>
    <thead>
        <tr>
           <th>TITRE</th>
           <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                <td><?= $film["date_sortie"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    <div class="button">
        <button><a href="index.php?action=addFilm">Ajouter un film</a></button>
    </div>
<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";