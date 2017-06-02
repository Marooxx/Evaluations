<?php
// tableau
$tableau = array(
    "Prénom" => "Jean-Paul",
    "Nom" => "Belmondo",
    "Adresse" => "666 rue du Paradis",
    "Code postal" => "75000",
    "Ville" => "Paris",
    "Email" => "bebel@lemarginal.org",
    "Téléphone" => "0612345678",
    "Date de naissance" => "1933-04-09" // format anglo-saxon : YYYY-MM-DD
);
// fin du tableau

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercice 1 - Evaluation WF3 n°3</title>
    </head>
    <body>
        <ul>
            <?php
            // affichage PHP sous forme de liste
            foreach ($tableau as $cle => $valeur) {

                echo "<li>";
                // retraitement de la date de naissance (bonus)
                if ($cle == 'Date de naissance') {
                    $newDate = date("d-m-Y", strtotime($valeur));
                    // strtotime() transforme une date au format anglo-saxon en un timestamp Unix et en 1er paramètre je met le format d'affichage souhaité (ici français)
                    echo "$cle => $newDate";
                } else {
                    echo "$cle => $valeur";
                }
                echo "</li>";

            }
            ?>
        </ul>
    </body>
</html>



