<?php 
$mysqli = new Mysqli('localhost', 'root', '', 'exercice_3');

// requete pour récupérer tous les films : 
$resultat= $mysqli -> query("SELECT * FROM movies");

?>
<h1>Liste de tous les films</h1>
<table border="2">	
	<tr>
		<th>Nom du film</th>
		<th>Réalisateur</th>
		<th>Année de production</th>
		<th>Action</th>
	</tr>
	<?php while($film = $resultat -> fetch_assoc()) : extract($film);?>
	<tr>
		<td><?= $title ?></td>
		<td><?= $director ?></td>
		<td><?= $year_of_prod ?></td>
		<td><a href="infos_film.php?id=<?= $id_film ?>">Plus d'infos</a></td>
	</tr>
	<?php endwhile; ?>
</table>

<a href="ajout_film.php">Ajouter un nouveau film</a>