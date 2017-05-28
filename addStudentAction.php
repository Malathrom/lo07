<?php
include "header.php";
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

<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> L'étudiant à été ajouté à la base de données.
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Consulter liste étudiants</h3>
            </div>
            <div class="panel-body">
                <a href="listStudents.php" class="btn btn-lg btn-default">Liste étudiants</a>
            </div>
        </div>
    </div>

</div>