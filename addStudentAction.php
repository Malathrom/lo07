<?php include "header.php";
include "baseConnect.php";


function addStudent($database, $numEtu, $nom, $prenom, $admission, $filiere) {
    
    $req = $database->prepare('INSERT INTO etudiant(numEtu, nom, prenom, admission, filiere) VALUES(:numEtu, :nom, :prenom, :admission, :filiere)');
    $req->execute(array(
        'numEtu' => $numEtu,
        'nom' => $nom,
        'prenom' => $prenom,
        'admission' => $admission,
        'filiere' => $filiere,
    ));
}

addStudent($database, $_GET["numEtu"], $_GET["nom"], $_GET["prenom"], $_GET["TC,BR"], $_GET["filiere"]);
?>
<div class="alert alert-success" role="alert">
        <strong>Well done!</strong> You successfully read this important alert message.
</div>
