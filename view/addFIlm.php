<?php 
session_start();
ob_start(); 
?>
<div class="form-action">
        <form action="index.php?action=addFilm" method="post" enctype="multipart/form-data">
            <p> Informations du film :<br> 
                <label>
                    Titre :
                    <input type="text" name="titre">
                </label>
            </p>
            <p>
                <label>
                    Année de sortie :
                    <input type="number" name="date_sortie">
                </label>
            </p>
            <p>
                <label>
                    Durée en minute :
                    <input type="number" name="duree">
                </label>
            </p>
            <p>
                <label>
                    Résumé :
                    <textarea name="resume" rows="20"></textarea>
                </label>
            </p>
            <p>
                <label>
                    Note :
                    <input type="number" step="any" name="note">
                </label>
            </p>
            <p>
                <label>
                    Genre(s) :<br>
                    <?php
                        foreach($requeteGenre->fetchAll() as $genre) { ?>
                            <input type="checkbox" name="genres[]" value="<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"]?><br>
                        <?php }
                    ?>
                    </label>
                </select>
            </p>
            <p>
                <label>
                    Réalisateur: <br>
                <select name="realisateur">
                    
                    <?php
                        foreach($requeteRealisateur->fetchAll() as $realisateur) { ?>
                            <option value="<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["prenom_personne"]." ".$realisateur["nom_personne"] ?></option>
                        <?php }
                    ?>
                </select>
                        </label>
                </p>
                    <label  for="file">Affiche du film:</label><br>
 
                    <input type="file" id="file" name="file"><br>
            <p>
            
                <input class="btn" type="submit" name="submit" value="Ajouter le film">
            </p>
            
        </form>
                        </div>
<?php

$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();
require "template.php";