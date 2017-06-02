<?php
$mysqli = new Mysqli('localhost', 'root', '', 'exercice_3');

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	$id = (int) $_GET['id'];
	$resultat = $mysqli -> query("SELECT * FROM movies WHERE id_film = $id");
	
	if($resultat -> num_rows != 0){ // Ma requete ma retourné au moins un résultat
		$film = $resultat -> fetch_assoc();
		extract($film);
	}
	else
	{
		header('location:liste_des_films.php');
	}
}
else{
	header('location:liste_des_films.php');
}

?>
<h1>Toutes les infos du film <?= $title ?></h1>
<ul>
	<li>Titre : <b><?= $title ?></b></li>
	<li>Producteur : <b><?= $producer ?></b></li>
	<li>Réalisateur : <b><?= $director ?></b></li>
	<li>Année de production : <b><?= $year_of_prod ?></b></li>
	<li>Catégorie : <b><?= $category ?></b></li>
	<li>Version : <b><?= $language ?></b></li>
</ul>

<h3>Résumé</h3>
<p><?= $storyline ?></p>


<h3>bande annonce:</h3>
<iframe width="560" height="315" src="<?= $video ?>" frameborder="0" allowfullscreen></iframe>
<!-- Attention pour utiliser l'iframe YOUTUBE, il faut non pas le lien de la vidéo mais le lien EMBED de la vidéo -->
<p>Lien de la bande annonce : <a href="<?= $video ?>">Cliquez ici</a></p>

<p><a href="liste_des_films.php">Retour à la liste des films</a></p>
<p><a href="ajout_film.php">Ajouter un nouveau film</a></p>

