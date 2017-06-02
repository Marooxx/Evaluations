<<?php
function executeRequete($req)
{
	global $mysqli;
	$resultat = $mysqli->query($req);
	if(!$resultat)
	{
	 die("Erreur sur la requête sql.<br>Message : " .$mysqli->error."<br>Code : ".$req );// si la requête échoue on va "mourir(die)" avec le message d'erreur
	 // mysqli-> error permet de piocher les informations dans la variable pour savoir si il existe des erreurs
		// avec die() , le script s'interrompt.

	}
	return $resultat;
	// on retourne un objet issu de la classe mysqli_result(en cas de requête SELECT, autre requête: true ou false)
}
executeRequete("SELECT*FROM movies");
?>
