<?php 
session_start();
ob_start(); 
?>
<div class="form-action">
        <form action="index.php?action=addCasting" method="post">

            <p>
            <label>
            Film :<br>
                <select name="film">
                    <?php
                        foreach($requeteFilmCasting->fetchAll() as $film) { ?>
                            <option value="<?= $film["id_film"] ?>"><?= $film["titre"] ?></option>
                        <?php }
                    ?>
                </select>
            </p>
            <p>
            <label>
                Acteur :<br>
                <select name="acteur">
                    <?php
                        foreach($requeteActeurCasting->fetchAll() as $acteur) { ?>
                            <option value="<?= $acteur["id_acteur"] ?>"><?= $acteur["prenom_personne"] ?> <?= $acteur["nom_personne"] ?></option>
                        <?php }
                    ?>
                </select>
            </p>
            <p>
            <label>
                Rôle :<br>
                <select name="role">
                    <?php
                        foreach($requeteRoleCasting->fetchAll() as $role) { ?>
                            <option value="<?= $role["id_role"] ?>"><?= $role["nom_role"]?></option>
                        <?php }
                    ?>
                </select>
            </p>
            
            <p>
                <input class="btn" type="submit" name="submit" value="Associer l'acteur">
            </p>
            

        </form>
                        </div>
<?php

$titre = "Associer un acteur à un film et un rôle";
$titre_secondaire = "Associer un acteur à un film et un rôle";
$contenu = ob_get_clean();
require "template.php";