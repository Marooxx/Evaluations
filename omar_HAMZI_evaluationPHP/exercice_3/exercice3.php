<?php
echo '<h2> Exercice n°3 : "Et si on regardait un film ?"</h2> ';
echo "<h3> Etape 1</h3> ";
echo "Création de la Base de donnée ( voir fichier 'film.sql') <br /><br />";
?>
                             <!-- LE FORMULAIRE----->

<div class="form">
   <form method="post">

                     <!-- Titre du film-->
        <label for="title">Le nom du film :</label><br />
        <input type="text" name="title" id="title" placeholder="Saisissez le nom du film" size="30" maxlength="5" /><br /><br />

                       <!--  Acteurs -->
        <label for="actors">Les noms des acteurs :</label><br />
        <input type="text" name="actors" id="actors" placeholder="Saisissez le nom des acteurs" maxlength="5"/><br /><br />

                       <!--Réalisateur -->
        <label for="director">Le nom du réalisateur :</label><br />
        <input type="text" name="director" id="director" placeholder="Saisissez le nom du réalisateur" maxlength="5"/><br /><br />




            <!--  Langue du film -->
            <label for="language">La langue du film :</label><br />
            <select name="language">
                <option>Français</option>
                <option>Allemand</option>
                <option>Anglais</option>
            </select><br /><br />



                    <!-- Categorie  -->
        <label for="category">Style du film</label><br />
        <select name="category">
            <option>Thriller</option>
            <option>SF</option>
            <option>Policier</option>
            <option>Comedie</option>
            <option>Action</option>
        </select><br /><br />

                    <!-- Sypnopsis-->
        <label for="storyline"> Le synopsis du film</label><br />
        <input name="storyline" type="text" maxlength="5"><br /><br />

                    <!--Bande- annonce  -->
        <label for="video">Bande annonce du film :</label><br />
        <iframe width="450" height="250" src="https://www.youtube.com/embed/bly7XM7QzSY" frameborder="0" allowfullscreen></iframe><br /><br />


        <input type="submit" value="envoi">
    </form>
</div>

<?php

$mysqli = new Mysqli("localhost","root","","film");

// REQUETE D'INSERTION

if($_POST){
//print_r($_POST);
$result = $mysqli->query("INSERT INTO movies (id_film,title,director,producer,year_of_prod,language,category,storyline,video) VALUES('$_POST[id_film]','$_POST[title]','$_POST[director]','$_POST[producer]','$_POST[year_of_prod]','$_POST[language]','$_POST[category]','$_POST[storyline]','$_POST[video]')");
	echo "<p> Votre requête a été prise en compte !</p>";
	}


?>
<style>
form {
    /* Pour le centrer dans la page */
    margin: 0 auto;
    width: 400px;
    /* Pour voir les limites du formulaire */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
}
</style>
