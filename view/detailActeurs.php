<?php 

ob_start(); 
?>
<div class="detailActeur">
    <?php
    
        foreach($requeteActeurs->fetchAll() as $acteur){ ?>
        <p> Prénom: <?=$acteur["prenom_personne"]?>
            <p> Nom: <?=$acteur["nom_personne"]?>
            <p> Sexe: <?=$acteur["sexe"]?>
            <p> Date de Naissance: <?=$acteur["nvlle_date"]?>
            <?php } ?>
</div>
            <table>
                <thead>
                    <tr>
                        <th> Films </th>
                        <th> Nom du rôle</th>
                    
                    </tr>
                </thead>
            <tbody>

            
    <?php
                foreach($requeteDetailActeurFilms->fetchAll() as $films){ ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?=$films["id_film"]?>"><?= $films["titre"]?></a></td>
                    <td><a href="index.php?action=detailFilm&id=<?= $films["id_film"]?>"><?= $films["nom_role"]?></a></td>
            
                </tr>
                
                <?php } ?>
        </tbody>
    </table> 

        <?php

$titre = "Détail de l'acteur";
$titre_secondaire = "Détail de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";
