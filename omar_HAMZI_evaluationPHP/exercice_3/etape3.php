<?php

function executeRequete($req)
	{
	global $mysqli;
	$resultat = $mysqli->query($req);
	if (!$resultat)
		{
		die("Erreur sur la requête sql.<br />Message : " . $mysqli->error . "<br />Code : " . $req); // si la requête échoue on va "mourir(die)" avec le message d'erreur

		// mysqli-> error permet de piocher les informations dans la variable pour savoir si il existe des erreurs
		// avec die() , le script s'interrompt.

		}

	return $resultat;

	// on retourne un objet issu de la classe mysqli_result(en cas de requête SELECT, autre requête: true ou false)

	}

executeRequete("SELECT*FROM movies");

// //**********************************************************************************////

$mysqli = new Mysqli("localhost", "root", "", "film");
$resultat = $mysqli->query("SELECT title,director,year_of_prod FROM movies ");
echo '<table border="1" style="border-collapse:collapse;"><tr>';

while ($colonne = $resultat->fetch_field())
	{

	// sert �  extraire les champs du tableau
	// $colonne est issue de la classe STD

	echo '<th>' . $colonne->name . '</th>';
	} // la bouche va tourner tant qu'il y aura de champs
echo '</tr>';

while ($ligne = $resultat->fetch_assoc())
	{
	echo '<tr>';
	foreach($ligne as $indice => $informations)
		{
		echo '<td>' . $informations . '</td>';
		}

	echo '</tr>';
	}

echo '</table>';
echo "<a href='?etape3.php='>plus d'infos</a>";

// ******************* POUR LE DETAILS DES FILMS***********************

echo "<h1> Voici les films choisis</h1>";
echo "<table border='1'><tr>";
$information_sur_les_films = executeRequete("SELECT title,director,year_of_prod FROM movies"); // c'est une jointure de table entre la table membre et commande

// lorsque l'on fait une requête �  partir d'une variable mysqli , elle devient une variable de la classe mysqli_result

echo "Nombre de film: " . $information_sur_les_films->num_rows;
echo "<table style='border-color=black' border=1</tr>";

while ($colonne = $information_sur_les_films->fetch_field())
	{
	echo "<th>" . $colonne->name . "</th>";

	//

	}

echo "</tr";

while ($film = $information_sur_les_films->fetch_assoc())
	{
	echo "<div>";
	echo "<tr>";

	// j 'envoi les informations dans l'url

	echo '<td><a href="?suivi=' . $film['id_film'] . '">Voir les films ' . $film['id_film'] . "</a></td>";

	// ici on va afficher grâce � la boucle while , l'ensemble des données d'un tableau

	echo "<td>" . $film['title'] . "</td>";
	echo "<td>" . $film['director'] . "</td>";
	echo "<td>" . $film['montant'] . "</td>";
	echo "<td>" . $film['year_of_prod'] . "</td>";
	echo "</div>";
	}

echo '</table><br />';

// echo "Le nombre de film  :". $chiffre_affaire ."<br />";

echo "<br />";

// details_commande

if (isset($_GET['suivi']))
	{ // lorsque je clique sur le lien "voir commande " , il v a s'afficher dans l'url ?suivi. Je rentre dans le if
	echo '<h1> Voici le détails </h1>';
	echo "<table border='1'>";
	echo '<tr>';
	$information_sur_les_films = executeRequete("SELECT * FROM movies WHERE id_film=$_GET[suivi]");
	while ($colonne = $information_sur_les_films->fetch_field())
		{
		echo '<th>' . $colonne->name . '</th>';
		}

	echo "<tr>";
	while ($details_film = $information_sur_les_films->fetch_assoc())
		{
		echo '<tr>';
		echo "<td>" . $details_commande['title'] . '</td>';
		echo "<td>" . $details_commande['director'] . '</td>';
		echo "<td>" . $details_commande['year_of_prod'] . '</td>';
		echo "</tr>";
		}

	echo "</table>";
	}

?>
