<?php
$mysqli = new mysqli('localhost','root','','film');
// Traitement pour récupérer toutes les valeurs de notre enum "category". Ce traitement est spécifique car on récupère toutes les valeurs même si aucun enregistrement n'existe pour le moment.
		$resultat = $mysqli-> query("SHOW COLUMNS FROM movies LIKE 'category'");// on récupére toutes les options
		$row = $resultat->fetch_assoc();

	preg_match('/enum\(\'(.*)\'\)$/', $row['Type'], $matches);
$values = explode('\',\'', $matches[1]);

	$msg = '';//on crée une variable de controle avec rien pour valeur

	if(isset($_POST['ajout']))
	{
		if(empty($_POST['title']) || strlen($_POST['title'])<5)
		{
			$msg .= "Attention, veuillez renseigner un titre de 5 caractères minimum";
		}
		
		if(empty($_POST['actors']) || strlen($_POST['actors'])<5)
		{
			$msg .= "Attention, veuillez renseigner les acteurs  (5 caractères minimum";
		}
		
		if(empty($_POST['director']) || strlen($_POST['director'])<5)
		{
			$msg .= "Attention, veuillez renseigner le réalisateur  (5 caractères minimum)";
		}
		
		if(empty($_POST['producer']) || strlen($_POST['producer'])<5)
		{
			$msg .= "Attention, veuillez renseigner les acteurs  (5 caractères minimum)";
		}

		if(empty($_POST['year_of_production']) || strlen($_POST['year_of_production'])!=4 || !is_numeric($_POST['year_of_production']))
		{
			$msg .= "Attention, veuillez renseigner l'année au bon format  (ex : 2017)";
		}

		if(empty($_POST['storyline']) || strlen($_POST['storyline']<5  ))
		{
			$msg .= "Attention, veuillez renseigner le résumé en 5 caractères minimum";
		}


		if(!filter_var($_POST['video'], FILTER_VALIDATE_URL))
		{
			$msg .= "Attention, veuillez renseigner le Résumé (5 caractères minimum)";
		}

		if(empty($msg))// si la variable msg est vide cela signifie que je peux enregister les informations en BDD

		{
			$mysqli->query("INSERT INTO movies(title,actors;director,producer,year_of_production,language,category,storyline,video) VALUES('$_POST[title]','$_POST[actors]','$_POST[director]','$_POST[producer]','$_POST[year_of_production]','$_POST[language]','$_POST[category]','$_POST[video]')");
			if($resultat)
			{
				$msg .= '<p style="color:write;background:green;padding:5px;"> Le film '.$_POST[title].' a bien été ajouté à la base de donnée ! </p>';
			}
		}

	}


?>

<h2> LSITING DE FILMS</h2>

<form action="" method="post" >
<?php echo $msg ?><!-- ou <?= $msg ?> cela veut dire la même chose-->


	<label>Titre du film : </label><br>
	<input type="text" name="title" value=""><br><br>	
	
	<label>Acteurs : </label><br>
	<input type="text" name="actors" value=""><br><br>	

	<label>Réalisateur : </label><br>
	<input type="text" name="director" value=""><br><br>	

	<label>Producteur : </label><br>
	<input type="text" name="producteur" value=""><br><br>

	<label>Année de production : </label><br>
	<select name="year_of_production">
		<?php
			for($i = 2017;$i>=1950;$i--)
			{
				echo '<option>'.$i.'</option>';
			
			}
		?>
	</select><br><br>

	<label>Langue : </label><br>
	<select name="language">
		<option value="français">Français</option>
		<option value="anglais">Anglais</option>
		<option value="russe">Russe</option>
		<option value="italien">Italien</option>
	</select><br><br>

	<label>Catégorie : </label><br>
	<select name="category">
	<?php
	foreach($values as $categorie)
	{
		echo'<option>'.$categorie.'</option>';
	}
	


	?>
	</select><br><br>

	<label for="">Résumé</label><br>
	<textarea name=""></textarea><br><br>

	<label>Bande annonce : </label><br>
	<input type="text" name="video" value=""><br><br>

	<input type="submit" name="ajout" value="Valider">



		



</form>
