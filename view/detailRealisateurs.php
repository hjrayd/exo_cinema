
<?php ob_start();?>
<div id="wrapper">
    <?php
        foreach($requeteRealisateurs->fetchAll() as $realisateur){ ?>
            <p> Prénom: <?=$realisateur["prenom_personne"]?>
            <p> Nom: <?=$realisateur["nom_personne"]?>
            <p> Sexe: <?=$realisateur["sexe"]?>
            <p> Date de Naissance: <?=$realisateur["nvlle_date"]?>
            <?php } ?>

            <table>
                <thead>
                    <tr>
                        <th> Film</th>
                    </tr>
                </thead>
            <tbody>
    <?php
                foreach($requeteFilms->fetchAll() as $film){ ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><?= $film["titre"]?> (<?= $film["date_sortie"]?>)</a></td>
                    
                </tr>
                
                <?php } ?>
        </tbody>
    </table> 

<?php

$titre = "Détail du réalisateur";
$titre_secondaire = "Détail du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";