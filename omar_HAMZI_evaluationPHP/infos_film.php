<?php
$mysqli = new mysqli('localhost','root','','film');

if(isset($_GET['id']) && !empty($_GET['id'])&& is_numeric($_GET['id']))
	{
		$id = (int) $_GET['id'];
		$resultat = $mysqli -> query('SELECT * FROM movies WHERE id_film = $id');

		if($resultat -> num_rows != 0) // Ma requête m'a retournée au moins un résultat
		$film = $resultat -> fetch_assoc();
		extract ($film);

	}

	else 
		{
			header('location:liste_des_films.php');
		}
	}
	else
		{
			header('location:liste_des_films.php');
		}
	

?>
<h1> Toutes les infos du film<?= $title ?></h1>
	<ul>
		<li> Titre : <b><?=$title?></b></li>
		<li> Producteur : <b><?=$producer?></b> </li>
		<li> Réalisateur : <b><?=$director?></b> </li>
		<li> Année de production :<b><?=$year_of_production?></b> </li>
		<li> Catégorie  :<b><?=$category?></b> </li>
		<li> Version :<b><?=$language?></b></li>
	</ul>
	<h3>Résumé</h3>
	<p><?= $storyline?></p>

	<h3>Bande Annonce</h3>
	<a href="<?$video?>"><?= $video?></a>
	<!-- Attention pour utiliser l'iframe Youtube,il ne faut pas le simple lien de la video mais le lien embbed-->

	<p><a href="liste_des_films.php">Retour à la liste des films</a></p>
	<p><a href="ajout_film.php">Ajouter des films</a></p>


