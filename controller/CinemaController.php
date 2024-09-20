<?php
    namespace Controller;

    use Model\Connect;

    class CinemaController {

        public function accueil() {
            $pdo = Connect::seConnecter();

            $requete = $pdo->query("SELECT id_film, titre, note, afficheFilm FROM film
            ORDER BY note DESC
            LIMIT 3");

            $requetee = $pdo->query("SELECT id_film, titre, date_sortie, afficheFilm FROM film
            ORDER BY date_sortie DESC
            LIMIT 3");
            require "view/accueil.php";
        }

        public function listFilms() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT id_film, titre, date_sortie FROM film");

            require "view/listFilms.php";
        }

        public function listActeurs() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
            SELECT nom_personne, prenom_personne, id_acteur
            FROM personne
            INNER JOIN acteur ON personne.id_personne = acteur.id_personne;
            ");

            require "view/listActeurs.php";
        }

        public function listRealisateurs() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
            SELECT nom_personne, prenom_personne, id_realisateur
            FROM personne
            INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne;
            ");

            require "view/listRealisateurs.php";
        }

        public function listGenres() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
            SELECT nom_genre, id_genre
            FROM genre
            ");

            require "view/listGenres.php";
        }

        public function listRoles() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
            SELECT nom_role, id_role
            FROM role
            ");

            require "view/listRoles.php";
        }

        public function detailFilm($id) {

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            SELECT date_sortie, resume, duree, titre, note, prenom_personne, nom_personne, realisateur.id_realisateur
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            WHERE id_film = :id
            ");
            $requete->execute(["id" => $id]);

            require "view/detailFilm.php";
        }

        public function detailRealisateurs($id) {
            $pdo = Connect::seConnecter();
            $requeteRealisateurs = $pdo->prepare("
            SELECT nom_personne, prenom_personne, sexe, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS nvlle_date, realisateur.id_realisateur
            FROM personne
            INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
            WHERE id_realisateur = :id
            ");
            $requeteRealisateurs->execute(["id" => $id]);

            $requeteFilms = $pdo->prepare("
            SELECT film.titre, film.date_sortie, film.id_film, realisateur.id_realisateur
            FROM film
            INNER JOIN realisateur ON realisateur.id_realisateur = film.id_realisateur
            WHERE realisateur.id_realisateur = :id
            ");
            $requeteFilms->execute(["id" => $id]);

            require "view/detailRealisateurs.php";
        }

        public function detailActeurs($id) {

            $pdo = Connect::seConnecter();
            $requeteActeurs = $pdo->prepare("
            SELECT personne.nom_personne, personne.prenom_personne, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS nvlle_date, personne.sexe
            FROM acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            WHERE acteur.id_acteur = :id
            ");

            $requeteActeurs->execute(["id" => $id]);
            
            $requeteDetailActeurFilms = $pdo->prepare("
            SELECT film.titre, role.nom_role, film.id_film
            FROM casting
            INNER JOIN acteur ON acteur.id_acteur = casting.id_acteur
            INNER JOIN film  ON film.id_film = casting.id_film
            INNER JOIN role  ON role.id_role = casting.id_role
            WHERE casting.id_acteur = :id
            
            ");
            $requeteDetailActeurFilms->execute(["id" => $id]);

            require "view/detailActeurs.php";
        }

        public function detailRoles($id) {

            $pdo = Connect::seConnecter();
            $requeteRole = $pdo->prepare("
            SELECT nom_role
            FROM role
            WHERE id_role = :id
        ");
            $requeteRole->execute(["id" => $id]);

            $requeteRoles = $pdo->prepare("
            SELECT personne.prenom_personne, personne.nom_personne, film.titre, film.date_sortie, film.id_film, casting.id_acteur
            FROM casting
            INNER JOIN acteur ON acteur.id_acteur = casting.id_acteur
            INNER JOIN film ON film.id_film = casting.id_film
            INNER JOIN personne ON personne.id_personne = acteur.id_personne
            WHERE casting.id_role = :id
        ");
        $requeteRoles->execute(["id" => $id]);

        require "view/detailRoles.php";
    }


        public function detailGenre($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailGenre = $pdo->prepare("
            SELECT nom_genre, id_genre
            FROM genre
            WHERE id_genre = :id
           
        ");
        $requeteDetailGenre->execute(["id" => $id]);

        $requeteDetailGenres = $pdo->prepare("
        SELECT film.titre, genre.nom_genre, genre.id_genre, film.id_film
        FROM film
        INNER JOIN appartient ON appartient.id_film = film.id_film
        INNER JOIN genre ON genre.id_genre = appartient.id_genre
        WHERE genre.id_genre = :id
        ");
        $requeteDetailGenres->execute(["id" => $id]);
    
        require "view/detailGenre.php";
    }

        public function addActeur() {

        if(isset($_POST['submit'])) { 
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, "date_naissance");
            $pdo = Connect::seConnecter();
            $requete1 = $pdo->prepare("
                INSERT INTO personne (nom_personne, prenom_personne, sexe, date_naissance) VALUES
                (:nom, :prenom, :sexe, :date_naissance);
            ");
            $requete1->execute([
                "nom" => $nom, "prenom" => $prenom, "sexe" => $sexe, "date_naissance" => $date_naissance
            ]);

            $last_id = $pdo->lastInsertId();

            $requete2 = $pdo->prepare("
                INSERT INTO acteur (id_personne) VALUES  
                (:id_personne)
            ");
            
            $requete2->execute([
                ':id_personne' => $last_id
            ]);

            header("Location: index.php?action=listActeurs");

        }
        require "view/addActeur.php";
    }

        public function addRole() {

        if(isset($_POST['submit'])) {

            $name = filter_input(INPUT_POST, "nom_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO role (nom_role) VALUES
            (:nom_role);
            ");
            $requete->execute([
                "nom_role" => $name
            ]);

            header("Location: index.php?action=listRoles");

        }
        require "view/addRole.php";
    }

        public function addGenre() {
            if(isset($_POST['submit'])){
            $name = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO genre (nom_genre) VALUES
            (:nom_genre);
            ");
            $requete->execute([
                "nom_genre" => $name
            ]);

            header("Location: index.php?action=listGenres");

        }
        require "view/addGenre.php";
    }

        public function addFilm() {

        $pdo = Connect::seConnecter();
        $requeteRealisateur = $pdo->prepare("
        SELECT *
        FROM realisateur
        INNER JOIN personne  ON realisateur.id_personne = personne.id_personne");

        $requeteRealisateur->execute();

        $requeteGenre = $pdo->prepare("
        SELECT *
        FROM genre ");

        $requeteGenre->execute();

        if(isset($_POST['submit'])) {
            if(isset($_FILES["file"])) {
                $tmpName = $_FILES["file"]["tmp_name"];
                $name = $_FILES["file"]["name"];
                $size = $_FILES["file"]["size"];
                $error = $_FILES["file"]["error"];
               
                $tabExtension = explode(".", $name);
                $extension = strtolower(end($tabExtension));
                $extensions = ["jpg", "png", "jpeg", 'gif'];
                $maxSize = 4000000;
               
                if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                    $uniqueName = uniqid('', true);
                    $file = $uniqueName.".".$extension;
                    move_uploaded_file($tmpName, "./public/image/".$file);
                    $afficheFilm = "./public/image/".$file;
                } else {
                    $afficheFilm = NULL;
                }

            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_sortie  = filter_input(INPUT_POST, "date_sortie", FILTER_SANITIZE_NUMBER_INT);
            $resume = filter_input(INPUT_POST, "resume", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_NUMBER_INT);
            $genres = filter_input(INPUT_POST, "genres", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        

            $requeteFilm = $pdo->prepare("
            INSERT INTO film (titre, duree, resume, note, date_sortie, afficheFilm, id_realisateur)
            VALUES (:titre, :duree, :resume, :note, :date_sortie, :afficheImage, :realisateur)
            ");
            $requeteFilm->execute([
            "titre" => $titre,
            "date_sortie" => $date_sortie,
            "resume" => $resume,
            "duree" => $duree,
            "note" => $note,
            "afficheImage" => $afficheImage,
            "realisateur" => $realisateur
            ]);

            $id_film = $pdo -> lastInsertId();

            $requeteGenreFilm = $pdo->prepare("
            INSERT INTO appartient (id_film, id_genre)
            VALUES (:id_film, :id_genre)
            ");
            foreach ($genres as $genre) {
                $requeteGenreFilm->execute([
                    "id_film" => $id_film,
                    "id_genre" => $genre
                ]);
            }
           
            
            header("Location: index.php?action=listFilms");
            }
        }
            require "view/addFilm.php";
    }

        public function addRealisateur() {
        if(isset($_POST['submit'])) {
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, "date_naissance");
            $pdo = Connect::seConnecter();
            $requeteReal = $pdo->prepare("
            INSERT INTO personne (nom_personne, prenom_personne, sexe, date_naissance) VALUES
            (:nom, :prenom, :sexe, :date_naissance);
            ");
            $requeteReal->execute([
                "nom" => $nom, 
                "prenom" => $prenom, 
                "sexe" => $sexe, 
                "date_naissance" => $date_naissance
            ]);

            $last_id = $pdo->lastInsertId();

            $requeteReali = $pdo->prepare("
                INSERT INTO realisateur (id_personne) VALUES  
                (:id_personne)
            ");
            
            $requeteReali->execute([
                ':id_personne' => $last_id
            ]);

            header("Location: index.php?action=listRealisateurs");

        }
        require "view/addRealisateur.php";
    }

        public function addCasting() {

        $pdo = Connect::seConnecter();
        $requeteFilmCasting = $pdo->query("SELECT film.id_film, film.titre FROM film");
        $requeteFilmCasting->execute();

        $requeteActeurCasting = $pdo->query(
        "SELECT acteur.id_acteur , personne.prenom_personne, personne.nom_personne
        FROM personne
        INNER JOIN acteur 
        ON acteur.id_personne = personne.id_personne");                                  
        $requeteActeurCasting->execute();

        $requeteRoleCasting = $pdo->query("SELECT id_role, role.nom_role FROM role");
        $requeteRoleCasting->execute();
        
        if(isset($_POST['submit'])) {
            $film = filter_input(INPUT_POST, "film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
            $requeteCasting = $pdo->prepare("
            INSERT INTO casting (id_film, id_acteur, id_role)
            VALUES (:film, :acteur, :role)
            ");

            $requeteCasting->execute([
            "film" => $film, 
            "acteur" => $acteur, 
            "role" => $role
            ]);
            
            header("Location: index.php?action=listActeurs");
        }

        require "view/addCasting.php";
            
    }
}
   

?>


