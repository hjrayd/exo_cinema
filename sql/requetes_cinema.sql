/*1-Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et 
réalisateur*/
SELECT film.titre, film.date_sortie ,SEC_TO_TIME(duree*60) AS duree_heure, personne.nom_personne
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne;

 /*2-Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)*/
SELECT film.titre, SEC_TO_TIME(duree*60) AS duree_heure 
FROM film
WHERE duree > 135
ORDER BY duree DESC;
 /*3-Liste des films d’un réalisateur (en précisant l’année de sortie)*/
 SELECT film.titre, film.date_sortie ,personne.nom_personne,personne.prenom_personne
    FROM film
    INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
    INNER JOIN personne ON realisateur.id_personne = personne.id_personne
    WHERE personne.id_personne = 6;
  /*4-Nombre de films par genre (classés dans l’ordre décroissant)*/
SELECT genre.nom_genre, COUNT(id_film)
    FROM appartient
    INNER JOIN genre ON appartient.id_genre = genre.id_genre
    GROUP BY appartient.id_genre
    ORDER BY appartient.id_genre DESC;
  /*5-Nombre de films par réalisateur (classés dans l’ordre décroissant)*/
SELECT nom_personne, prenom_personne, COUNT(id_film) AS nb_film
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
GROUP BY film.id_realisateur
ORDER BY nb_film DESC;
  /*6-Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe*/
   SELECT film.titre, personne.nom_personne, personne.prenom_personne, personne.sexe
 FROM casting
 INNER JOIN film ON casting.id_film = film.id_film
 INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
 INNER JOIN personne ON acteur.id_personne = personne.id_personne
 WHERE casting.id_film = 5;

  /*7-Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de 
sortie (du film le plus récent au plus ancien)*/
 SELECT personne.prenom_personne, personne.nom_personne, film.titre , film.date_sortie ,role.nom_role
    FROM casting 
    INNER JOIN acteur ON acteur.id_acteur = casting.id_acteur
    INNER JOIN personne ON acteur.id_personne = personne.id_personne
    INNER JOIN film ON  film.id_film = casting.id_film
    INNER JOIN role ON role.id_role = casting.id_role
    WHERE acteur.id_acteur =26
    ORDER BY date_sortie DESC ;


/*8-Liste des personnes qui sont à la fois acteurs et réalisateurs*/
SELECT personne.nom_personne, personne.prenom_personne
FROM personne
INNER JOIN acteur ON personne.id_personne = acteur.id_personne
INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
WHERE realisateur.id_personne = acteur.id_personne;

/*9-Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)*/
SELECT film.date_sortie, film.titre
FROM film
WHERE date_sortie > YEAR(CURDATE()) - 5
ORDER BY film.date_sortie DESC;

/*10-Nombre d’hommes et de femmes parmi les acteurs*/
SELECT personne.sexe, COUNT(personne.sexe) AS nombre_acteurs
FROM acteur
INNER JOIN personne ON acteur.id_personne = personne.id_personne
GROUP BY personne.sexe;

/*11-Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)*/
SELECT personne.prenom_personne, personne.nom_personne, TIMESTAMPDIFF(YEAR, personne.date_naissance, CURDATE()) AS age
FROM personne
WHERE TIMESTAMPDIFF(YEAR, personne.date_naissance, CURDATE()) > 50
/*12-Acteurs ayant joué dans 3 films ou plus*/
 SELECT personne.nom_personne, personne.prenom_personne , COUNT(casting.id_film) AS nb_film
    FROM casting 
    INNER JOIN acteur ON acteur.id_acteur = casting.id_acteur
    INNER JOIN personne ON personne.id_personne = acteur.id_personne
    GROUP BY personne.prenom_personne ,personne.nom_personne
    HAVING COUNT(casting.id_film) >=3;




