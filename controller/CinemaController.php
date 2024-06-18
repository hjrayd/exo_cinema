<?php
    namespace Controller;
    use Model\Connect;

    class CinemaController {
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
           SELECT nom_genre
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

    public function addActeur() {
        if(isset($_POST['submit'])){
            
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
        if(isset($_POST['submit'])){
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
}
?>


