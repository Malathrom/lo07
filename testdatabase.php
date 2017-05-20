<?php

require_once 'baseConnect.php';
$requete = "select * from etudiant";
$response = $database->query($requete);
/*
echo '<ul>';
while ($data = $response->fetch()) {
    echo "<li>" . " nom = " . $data["nom"] . " prenom = " . $data["prenom"] . "</br>" . "</li>";
}

echo '</ul>';
*/
/*
  $req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ? AND prix <= ?');

  $req->execute(array($_GET['possesseur'], $_GET['prix_max']));
 */

function addStudent($numEtu, $nom, $prenom, $admission, $filiere) {
    $req = $GLOBALS["database"]->prepare('INSERT INTO etudiant(numEtu, nom, prenom, admission, filiere) VALUES(:numEtu, :nom, :prenom, :admission, :filiere)');
    $req->execute(array(
        'numEtu' => $numEtu,
        'nom' => $nom,
        'prenom' => $prenom,
        'admission' => $admission,
        'filiere' => $filiere,
    ));
}

/*
$database->exec('INSERT INTO avions(id, label, annee, passagers) VALUES("14", "155", "1945", "123")');*/
addStudent("1654566", "TESSSST", "MARCHEEEE", "TCB", "?");
