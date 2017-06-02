<?php
// EXERCICE N°1
$table = array('prenom'=>'Omar' ,'nom'=>'HAMZI','adresse'=>'43 avenue du Président Wilson','code_postal'=>'93210','ville'=>"La Plaine Saint-Denis",'email'=>"omarhamzi@ymail.com",'telephone'=>"0638012498",'date_naissance'=>"09/03/1980" );
// Affichage du tableau d'information
echo '<pre>';print_r($table);echo'</pre>';

echo "INFORMATIONS"."<br>";

// Création de la boucle
foreach ($table as $key=> $value)
{
    echo "<ul>";

    echo "<li>".$key.' : '.$value."</li><br>";
    echo "</ul>";
}


 ?>
