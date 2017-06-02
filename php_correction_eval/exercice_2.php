<?php
echo '<pre>';
print_r($_POST);
echo '</pre>'; 

// déclaration de la fonction conversion()
function conversion($montant, $devise){
	switch($devise){
		case 'usd' :
			$resultat = round($montant * 1.108679, 2);
			return $resultat; 
			break;
		
		case 'euro' : 
			$resultat = round($montant * 0.891321, 2);
			return $resultat;
			break; 
	}
}

// Traitements si le bouton convertir est cliqué
if(isset($_POST['conversion'])){ // Si l'utilisateur a cliqué sur le formulaire. 
	if(!empty($_POST['montant'])){
		if(is_numeric($_POST['montant'])){
			if($_POST['devise'] == 'usd' || $_POST['devise'] == 'euro'){
				// tout est OK, on peut éxécuter notre fonction conversion()
				
				$somme_convertie = conversion($_POST['montant'], $_POST['devise']);
				
				if($_POST['devise'] == 'euro'){
					echo $_POST['montant'] . '$ est égal à ' . $somme_convertie . '€';
				}
				else{
					echo $_POST['montant'] . '€ est égal à ' . $somme_convertie . '$';
				}	
			}
			else{
				echo '<p style="background: red; color: white; padding:5px">Seule la conversion euro/dollars est diponible</p>';
			}
		}
		else{
			echo '<p style="background: red; color: white; padding:5px">Veuillez renseigner une somme valide !</p>';
		}	
	}
	else{
		echo '<p style="background: red; color: white; padding:5px">Veuillez renseigner une somme à convertir !</p>';
	}
}
?>
<form method="post" action="">
	<input type="text" name="montant" placeholder="Somme à convertir"/>
	<select name="devise">
		<option value="usd">EUR -> USD</option>
		<option value="euro">USD -> EUR</option>
	</select>
	<input type="submit" value="Convertir" name="conversion"/>
</form>
