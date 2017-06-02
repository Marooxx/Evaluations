<?php
$mysqli = new mysqli('localhost','root','','film');
// requête pour récupérer tous les films
$resultat = $mysqli -> query('SELECT * FROM movies');
?>
<h1> Liste de tous les films</h1>


<table style="border:2px">
	
</style>>
	<tr>
		<th>Nom du film</th>
		<th>Réalisateur</th>
		<th>Année de production</th>
		<th>Action</th>
	</tr>	

<?php while($film = $resultat-> fetch_assoc()) : extract($film); ?>
	<tr>
		<td><?php echo $title;?></td>
		<td><?php echo $director;?></td>
		<td><?php echo $year_of_production;?></td>
	<!-- extract() permet de creer des variables au nom des indices-->
		<td><a href="infos_film.php?id=<"?=$id_film'></a>Plus d'infos</td>
	</tr>
<?php endwhile ?>
</table>

