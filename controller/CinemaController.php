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
           SELECT nom_personne, prenom_personne
            FROM personne
            INNER JOIN acteur ON personne.id_personne = acteur.id_personne;
            ");

            require "view/listActeurs.php";
        }

        public function listRealisateurs() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
           SELECT nom_personne, prenom_personne
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
         SELECT nom_role
        FROM role
        INNER JOIN casting ON role.id_role = casting.id_role
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
                SELECT nom_personne, prenom_personne, sexe, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS nvlle_date
                FROM personne
                INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
                WHERE id_realisateur = :id
               
            ");
            $requeteRealisateurs->execute(["id" => $id]);

            require "view/detailRealisateurs.php";
        }

    }
?>


