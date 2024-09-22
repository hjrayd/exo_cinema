
<?php ob_start();?>



    <?php
        foreach($requeteDetailGenre->fetchAll() as $genre){ ?>
            <p> Nom du genre: <?=$genre["nom_genre"]?>
        
            <?php } ?>

            <table>
                <thead>
                    <tr>
                        <th> Film</th>
                
                    </tr>
                </thead>
            <tbody>
    <?php
                foreach($requeteDetailGenres->fetchAll() as $genres){ ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?=$genres["id_film"]?>"><?= $genres["titre"]?></a></td>
            
                </tr>
                
                <?php } ?>
        </tbody>
    </table> 

<?php

$titre = "Détail du genre";
$titre_secondaire = "Détail du genre";
$contenu = ob_get_clean();
require "view/template.php";