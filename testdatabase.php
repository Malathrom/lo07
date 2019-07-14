<?php
require_once 'baseConnect.php';
$requete = "select * from etudiant";
$response = $database->query($requete);

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

addStudent("1654566", "TESSSST", "MARCHEEEE", "TCB", "?");
