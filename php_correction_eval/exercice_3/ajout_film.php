<?php
$mysqli = new Mysqli('localhost', 'root', '', 'exercice_3');



// traitement pour récupérer toutes les valeurs de notre enum 'category'. Ce traitement est spécifique car on récupère toutes les valeurs, même si aucun enregistrement n'existe pour le moment. 
$resultat = $mysqli -> query("SHOW COLUMNS FROM movies LIKE 'category'");
$row = $resultat -> fetch_assoc();

//print_r($row);
preg_match('/enum\(\'(.*)\'\)$/', $row['Type'], $matches);
$values = explode('\',\'', $matches[1]);
//print_r($values);

$msg = ''; 

if(isset($_POST['ajout'])){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	if(empty($_POST['title']) || strlen($_POST['title']) < 5){
		$msg .= 'Attention, veuillez renseigner un titre de 5 caractères minimum';
	}
	
	if(empty($_POST['actors']) || strlen($_POST['actors']) <5 ){
		$msg .= 'Attention, veuillez renseigner les acteurs (5 caractères minimum)';
	}
	
	if(empty($_POST['director']) || strlen($_POST['director']) <5 ){
		$msg .= 'Attention, veuillez renseigner un réalisateur (5 caractères minimum)';
	}
	
	if(empty($_POST['producer']) || strlen($_POST['producer']) <5 ){
		$msg .= 'Attention, veuillez renseigner un producteur (5 caractères minimum)';
	}
	
	if(empty($_POST['year_of_prod']) || strlen($_POST['year_of_prod']) != 4 || !is_numeric($_POST['year_of_prod'])){
		$msg .= 'Attention, veuillez renseigner une année de production format ex : 2017';
	}
	
	if(empty($_POST['storyline']) || strlen($_POST['storyline']) < 5){
		$msg .= 'Attention, veuillez renseigner un résumé (5 caractères minimum)';
	}
	
	if(!filter_var($_POST['video'], FILTER_VALIDATE_URL)){
		$msg .= 'Attention, veuillez renseigner un lien vidéo valide';
	}
	
	if(empty($msg)){ // si la variable $msg est vide cela signifie que je n'ai aucune erreur dans le formulaire et que l'on peut enregistrer les informations en BDD. 
		$resultat = $mysqli -> query("INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES ('$_POST[title]', '$_POST[actors]', '$_POST[director]', '$_POST[producer]', '$_POST[year_of_prod]', '$_POST[language]', '$_POST[category]', '$_POST[storyline]', '$_POST[video]' ) ");
		
		if($resultat){
			$msg .= '<p style="color: white; background: green; padding: 5px;">Le film ' . $_POST['title'] . ' a bien été ajouté à la base de données !</p>';
		}	
	}
}

?>

<form method="post" action="">
	<?php echo $msg; ?>

	<label>Titre du film :</label><br/>
	<input type="text" name="title"/><br/><br/>
	
	<label>Acteurs :</label><br/>
	<input type="text" name="actors"/><br/><br/>
	
	<label>Réalisateur :</label><br/>
	<input type="text" name="director"/><br/><br/>
	
	<label>Producteur :</label><br/>
	<input type="text" name="producer"/><br/><br/>
	
	<label>Année de production :</label><br/>
	<select name="year_of_prod">	
		<?php
			for($i = 2017; $i >= 1950; $i--){
				echo '<option>' . $i . '</option>';
			}
		?>	
	</select><br/><br/>
	
	<label>Langue :</label><br/>
	<select name="language">
		<option value="francais">Français</option>
		<option value="anglais">Anglais</option>
		<option value="russe">Russe</option>
		<option value="italien">Italien</option>
	</select><br/><br/>
	
	<label>Categorie :</label><br/>
	<select name="category">
		<?php
			foreach($values as $categorie){
				echo '<option>' . $categorie . '</option>';
			}
		?>
	</select><br/><br/>
	
	<label>Résumé :</label><br/>
	<textarea name="storyline"></textarea><br/><br/>
	
	<label>bande annonce :</label><br/>
	<input type="text" name="video" /><br/><br/>
	
	<input type="submit" name="ajout" value="Ajouter le film" />
</form>