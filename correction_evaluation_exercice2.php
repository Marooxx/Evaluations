
<h2>Exercice 2 / Convertisseur USD->EUR</h2>
<form method="post">
<input type="text" name="montant" placeholder="Somme à convertir">
<select name="devise">
<option value="usd">EUR->USD</option>
<option value="euro">USD->EUR</option>
</select><br><br>

<input type="submit" value='convertir' name="conversion">


</form>

<?php
// Declaration de la fonction conversion()


function conversion($montant,$devise)
{
	switch($devise)
	{
		case'usd':
		// c'est la value="usd" que l'on met entre guillemets, ici usd
		$resultat=round($montant*1.108679,2);
		return $resultat;
		break;

		case'euro':
		// c'est la value="euro" que l'on met entre guillemets, ici usd
		$resultat=round($montant*0.891321,2);
		return $resultat;
		break;
	}

}



// Traitement si le bouton convertir est cliqué
if(isset($_POST['conversion']))// si l'utilisateur a cliqué sur le formulaire
{
	if(!empty($_POST['montant']))
	{
		if(is_numeric($_POST['montant']))
		{
			if($_POST['devise'] == 'usd' || $_POST['devise'] == 'euro' )
			{// tout est ok , on peut executer notre fonction conversion
				$somme_convertie = conversion($_POST['montant'],$_POST['devise']);

				if($_POST['devise'] == 'euro')
				{
					echo $_POST['montant']. ' $ est égal à ' .$somme_convertie . ' €';
				}
				else
				{
					echo $_POST['montant'] . ' € est égal à ' . $somme_convertie . " $";
				}
			}
		}	else
				{
					echo"<p style='background:red; color:white;padding:5px;'> Seule une valeur numerique est acceptéé </p>";
				}
		}
	else
	{
	echo "<p style='background:red; color:white;padding:5px;'> Veuillez renseigner une somme à convertir</p>";
	}

}
